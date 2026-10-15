<?php
require_once __DIR__ . '/data.php';

function h($value): string { return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8'); }
function money($n): string { return 'NPR ' . number_format((float)$n); }

function get_place(int $id): ?array {
    global $places;
    foreach ($places as $p) if ((int)$p['id'] === $id) return $p;
    return null;
}

function budget_ceiling(string $budget): int {
    return match ($budget) {
        'Under NPR 2,000' => 2000,
        'NPR 2,000–5,000' => 5000,
        'NPR 5,000–10,000' => 10000,
        'Above NPR 10,000' => 20000,
        default => 5000,
    };
}

function score_place(array $place, array $prefs): array {
    $interests = $prefs['interests'] ?? [];
    $group = $prefs['group'] ?? 'Solo';
    $budget = budget_ceiling($prefs['budget'] ?? 'NPR 2,000–5,000');
    $days = max(1, (int)($prefs['days'] ?? 1));

    $matches = count(array_intersect($interests, $place['tags']));
    $interestMatch = count($interests) ? min(1, $matches / max(1, min(3, count($interests)))) : 0.4;
    $budgetPerDay = $budget / $days;
    $budgetMatch = $place['cost'] <= $budgetPerDay ? 1 : max(0, 1 - (($place['cost'] - $budgetPerDay) / max(1, $budgetPerDay)));
    $timeMatch = $place['duration'] <= 4 ? 1 : ($place['duration'] <= 6 ? .8 : .5);
    $groupMatch = in_array($group, $place['groups'], true) ? 1 : .4;
    $ratingMatch = min(1, $place['rating'] / 5);

    $score = $interestMatch * 40 + $budgetMatch * 20 + $timeMatch * 20 + $groupMatch * 10 + $ratingMatch * 10;
    return ['score'=>round($score, 1), 'interest'=>$interestMatch, 'budget'=>$budgetMatch, 'time'=>$timeMatch, 'group'=>$groupMatch];
}

function recommend_places(array $prefs, int $limit = 12): array {
    global $places;
    $scored = [];
    foreach ($places as $place) {
        $detail = score_place($place, $prefs);
        $place['score'] = $detail['score'];
        $scored[] = $place;
    }
    usort($scored, fn($a,$b) => $b['score'] <=> $a['score']);
    return array_slice($scored, 0, $limit);
}

function build_itinerary(array $prefs): array {
    $days = min(4, max(1, (int)($prefs['days'] ?? 1)));
    $recs = recommend_places($prefs, 12);
    $slots = ['Morning','Afternoon','Evening'];
    $result = [];
    $used = [];
    $cursor = 0;
    for ($d=1; $d <= $days; $d++) {
        $day = [];
        foreach ($slots as $slot) {
            while (isset($recs[$cursor]) && in_array($recs[$cursor]['id'], $used, true)) $cursor++;
            if (!isset($recs[$cursor])) $cursor = 0;
            $pick = $recs[$cursor] ?? null;
            if (!$pick) break;
            $used[] = $pick['id'];
            $pick['slot'] = $slot;
            $day[] = $pick;
            $cursor++;
        }
        $result[] = ['day'=>$d,'items'=>$day];
    }
    return $result;
}

function simple_sentiment(string $text): string {
    $t = strtolower($text);
    $positive = ['good','great','amazing','beautiful','clean','friendly','love','excellent','nice','helpful','safe','tasty'];
    $negative = ['bad','dirty','unsafe','rude','expensive','poor','terrible','awful','crowded','late','broken'];
    $p=$n=0;
    foreach ($positive as $w) if (str_contains($t,$w)) $p++;
    foreach ($negative as $w) if (str_contains($t,$w)) $n++;
    return $p > $n ? 'Positive' : ($n > $p ? 'Negative' : 'Neutral');
}

function translate_label(string $key, string $lang): string {
    $dict = [
        'ne'=>['Home'=>'गृहपृष्ठ','Explore'=>'अन्वेषण','Plan My Trip'=>'यात्रा योजना','Map'=>'नक्सा','Local Experiences'=>'स्थानीय अनुभव','Events'=>'कार्यक्रम','Saved'=>'सुरक्षित','About'=>'बारेमा','Search'=>'खोज्नुहोस्','View Details'=>'विवरण हेर्नुहोस्','Create My Itinerary'=>'मेरो यात्रा योजना बनाउनुहोस्'],
        'hi'=>['Home'=>'होम','Explore'=>'खोजें','Plan My Trip'=>'यात्रा योजना','Map'=>'मानचित्र','Local Experiences'=>'स्थानीय अनुभव','Events'=>'कार्यक्रम','Saved'=>'सहेजा गया','About'=>'परिचय','Search'=>'खोजें','View Details'=>'विवरण देखें','Create My Itinerary'=>'मेरी यात्रा बनाएं'],
    ];
    return $dict[$lang][$key] ?? $key;
}
