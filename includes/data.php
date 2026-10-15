<?php
// Prototype/demo dataset. Coordinates, prices, hours and event details are demo values unless explicitly verified.
$IMG_FOREST = 'https://images.unsplash.com/photo-1731340471796-bf113b75415b?auto=format&fit=crop&w=1400&q=85';
$IMG_CANOE  = 'https://images.unsplash.com/photo-1756305188383-6ee772e71a70?auto=format&fit=crop&w=1400&q=85';
$IMG_BOATS  = 'https://images.unsplash.com/photo-1704725109768-c0f0424339e3?auto=format&fit=crop&w=1400&q=85';
$IMG_ELEPHANT = 'https://images.unsplash.com/photo-1764078687670-ff5cac52d9e4?auto=format&fit=crop&w=1400&q=85';

$places = [
    [
        'id'=>1,'name'=>'Narayani Riverfront','category'=>'Nature','tags'=>['Nature','Photography','Relaxation','Food'],
        'rating'=>4.7,'location'=>'Narayani riverside, Bharatpur','cost'=>300,'duration'=>2.0,'lat'=>27.6816,'lng'=>84.4277,
        'groups'=>['Solo','Couple','Family','Friends'],'image'=>$IMG_BOATS,
        'description'=>'A calm riverside stop for sunset views, walking, photography and casual local snacks.',
        'why'=>'Strong match for nature, photography and relaxed evening plans.','best_time'=>'Late afternoon to sunset','hours'=>'Open public area; demo guidance only',
        'things'=>['Sunset walk','Riverside photography','Try local snacks','Short relaxation stop'],
        'tips'=>['Carry water in warm months','Keep riverbank areas clean','Confirm local transport before returning late']
    ],
    [
        'id'=>2,'name'=>'Bishazari Tal (Twenty Thousand Lake)','category'=>'Wildlife','tags'=>['Wildlife','Nature','Photography','Relaxation'],
        'rating'=>4.6,'location'=>'Bharatpur–Chitwan area','cost'=>700,'duration'=>3.5,'lat'=>27.6172,'lng'=>84.4387,
        'groups'=>['Solo','Couple','Family','Friends'],'image'=>$IMG_FOREST,
        'description'=>'Wetland-style nature experience suited to birdwatching, quiet exploration and landscape photography.',
        'why'=>'Good for users selecting wildlife, nature or photography.','best_time'=>'Morning','hours'=>'Demo: verify local access conditions before travel',
        'things'=>['Nature walk','Birdwatching','Photography','Wetland observation'],
        'tips'=>['Use insect protection','Avoid disturbing wildlife','Check seasonal road/access conditions']
    ],
    [
        'id'=>3,'name'=>'Devghat Cultural & Riverside Area','category'=>'Culture','tags'=>['Culture','Religious','Nature','Photography'],
        'rating'=>4.5,'location'=>'Devghat area, near Bharatpur','cost'=>450,'duration'=>3.0,'lat'=>27.7149,'lng'=>84.4184,
        'groups'=>['Solo','Couple','Family','Friends'],'image'=>$IMG_CANOE,
        'description'=>'A cultural and riverside visit focused on local heritage, peaceful walking and respectful observation.',
        'why'=>'Balances cultural interest with a scenic river environment.','best_time'=>'Morning or late afternoon','hours'=>'Demo: site access varies',
        'things'=>['Heritage walk','River viewpoint','Local cultural observation','Photography'],
        'tips'=>['Dress respectfully around religious sites','Ask before photographing people','Allow extra time during festivals']
    ],
    [
        'id'=>4,'name'=>'Golaghat Confluence Viewpoint','category'=>'Nature','tags'=>['Nature','Photography','Relaxation','Adventure'],
        'rating'=>4.4,'location'=>'Western Bharatpur / Chitwan','cost'=>900,'duration'=>4.0,'lat'=>27.5730,'lng'=>84.3350,
        'groups'=>['Couple','Family','Friends'],'image'=>$IMG_BOATS,
        'description'=>'A scenic confluence-area outing designed for open landscapes, riverside views and an unhurried half-day trip.',
        'why'=>'Works well for users wanting scenic nature away from the city center.','best_time'=>'Afternoon to sunset','hours'=>'Demo access information',
        'things'=>['Scenic drive','River views','Photography','Picnic-style stop'],
        'tips'=>['Plan return transport','Check weather before going','Keep buffer time for road conditions']
    ],
    [
        'id'=>5,'name'=>'Meghauli Countryside Experience','category'=>'Local Experiences','tags'=>['Local Experiences','Culture','Nature','Food','Photography'],
        'rating'=>4.6,'location'=>'Meghauli area, Chitwan','cost'=>1500,'duration'=>5.0,'lat'=>27.5775,'lng'=>84.2262,
        'groups'=>['Solo','Couple','Family','Friends'],'image'=>$IMG_CANOE,
        'description'=>'A demo countryside itinerary mixing village landscapes, local food, community interaction and slow travel.',
        'why'=>'High-value pick for travelers who want local culture beyond major attractions.','best_time'=>'Daytime','hours'=>'Experience timing depends on provider',
        'things'=>['Countryside walk','Local meal','Community visit','Photography'],
        'tips'=>['Book community activities in advance','Respect local customs','Carry cash for small purchases']
    ],
    [
        'id'=>6,'name'=>'Chitwan Forest & Canoe Day Experience','category'=>'Adventure','tags'=>['Adventure','Wildlife','Nature','Photography'],
        'rating'=>4.8,'location'=>'Chitwan tourism zone','cost'=>3200,'duration'=>6.0,'lat'=>27.5795,'lng'=>84.4948,
        'groups'=>['Solo','Couple','Family','Friends'],'image'=>$IMG_ELEPHANT,
        'description'=>'A demo full-day nature and canoe-style experience inspired by the wider Chitwan tourism region.',
        'why'=>'Best suited to wildlife and adventure-heavy preference combinations.','best_time'=>'Early morning','hours'=>'Provider-specific; verify before booking',
        'things'=>['Guided nature activity','Canoe-style experience','Wildlife observation','Photography'],
        'tips'=>['Use licensed local operators','Follow wildlife safety instructions','Do not approach wild animals']
    ],
    [
        'id'=>7,'name'=>'Bharatpur Local Food Trail','category'=>'Food','tags'=>['Food','Local Experiences','Culture','Shopping'],
        'rating'=>4.5,'location'=>'Central Bharatpur','cost'=>1200,'duration'=>2.5,'lat'=>27.6768,'lng'=>84.4352,
        'groups'=>['Solo','Couple','Family','Friends'],'image'=>$IMG_BOATS,
        'description'=>'A curated prototype food trail combining locally popular Nepali and Chitwan-style dining stops.',
        'why'=>'Directly matches food-first travelers and fits well into evening itinerary slots.','best_time'=>'Lunch or evening','hours'=>'Restaurant hours vary',
        'things'=>['Taste local dishes','Visit a café','Try seasonal snacks','Support local eateries'],
        'tips'=>['Ask about spice level','Confirm dietary needs','Choose busy, hygienic venues']
    ],
    [
        'id'=>8,'name'=>'Tharu Culture Evening (Demo Experience)','category'=>'Culture','tags'=>['Culture','Local Experiences','Food','Photography'],
        'rating'=>4.7,'location'=>'Chitwan cultural tourism zone','cost'=>1400,'duration'=>2.5,'lat'=>27.5845,'lng'=>84.5010,
        'groups'=>['Couple','Family','Friends'],'image'=>$IMG_ELEPHANT,
        'description'=>'A prototype cultural-evening listing highlighting local performance, storytelling and food experiences.',
        'why'=>'Adds a cultural evening activity after daytime nature exploration.','best_time'=>'Evening','hours'=>'Demo event schedule',
        'things'=>['Cultural performance','Local food','Craft browsing','Community storytelling'],
        'tips'=>['Choose community-based operators','Ask permission for close-up photos','Arrive before the program starts']
    ],
    [
        'id'=>9,'name'=>'Diyalo Bangala Heritage Stop','category'=>'Culture','tags'=>['Culture','Photography','Local Experiences'],
        'rating'=>4.2,'location'=>'Bharatpur area','cost'=>250,'duration'=>1.5,'lat'=>27.6861,'lng'=>84.4214,
        'groups'=>['Solo','Couple','Family','Friends'],'image'=>$IMG_FOREST,
        'description'=>'A short heritage-oriented stop suitable for travelers interested in historic places and photography.',
        'why'=>'A low-cost cultural stop that fits easily between larger activities.','best_time'=>'Daytime','hours'=>'Demo: verify access before visiting',
        'things'=>['Exterior heritage viewing','Photography','Short local walk'],
        'tips'=>['Verify public access','Respect restricted areas','Pair with nearby riverfront stops']
    ],
    [
        'id'=>10,'name'=>'Bharatpur Market & Local Shopping Walk','category'=>'Shopping','tags'=>['Shopping','Food','Local Experiences','Culture'],
        'rating'=>4.3,'location'=>'Central Bharatpur','cost'=>1000,'duration'=>2.0,'lat'=>27.6800,'lng'=>84.4330,
        'groups'=>['Solo','Couple','Family','Friends'],'image'=>$IMG_CANOE,
        'description'=>'A demo walking route for local products, snacks, small businesses and everyday city life.',
        'why'=>'Useful for travelers who want shopping and local economic discovery.','best_time'=>'Late morning or afternoon','hours'=>'Shop hours vary',
        'things'=>['Browse local shops','Try snacks','Buy small gifts','Observe city life'],
        'tips'=>['Carry small cash','Compare prices politely','Protect valuables in crowded areas']
    ],
    [
        'id'=>11,'name'=>'Sunrise Nature Walk (Demo)','category'=>'Photography','tags'=>['Photography','Nature','Relaxation'],
        'rating'=>4.4,'location'=>'Bharatpur green belt / river approach','cost'=>200,'duration'=>1.5,'lat'=>27.6692,'lng'=>84.4208,
        'groups'=>['Solo','Couple','Friends'],'image'=>$IMG_FOREST,
        'description'=>'An early-morning prototype route focused on soft light, quiet streets and nature photography.',
        'why'=>'A low-cost photography-first option that leaves the rest of the day free.','best_time'=>'Sunrise','hours'=>'Public-route demo',
        'things'=>['Sunrise photography','Light walking','Bird observation'],
        'tips'=>['Start early','Use reflective clothing near roads','Travel with a companion in quiet areas']
    ],
    [
        'id'=>12,'name'=>'Family Riverside Picnic Stop','category'=>'Family','tags'=>['Family','Relaxation','Nature','Food'],
        'rating'=>4.3,'location'=>'Bharatpur riverside zone','cost'=>800,'duration'=>3.0,'lat'=>27.6740,'lng'=>84.4240,
        'groups'=>['Family','Friends'],'image'=>$IMG_BOATS,
        'description'=>'A simple family-friendly demo plan for open-air relaxation, snacks and a flexible riverside break.',
        'why'=>'Designed for families seeking an easy, lower-intensity stop.','best_time'=>'Afternoon','hours'=>'Public-area demo',
        'things'=>['Picnic','Short walk','Family photos','Snack stop'],
        'tips'=>['Supervise children near water','Use designated public spaces','Take waste back with you']
    ]
];

$experiences = [
    ['name'=>'Local Thali Tasting','type'=>'Eat Local','rating'=>4.6,'price'=>650,'location'=>'Central Bharatpur','image'=>$IMG_BOATS,'description'=>'Demo local dining experience featuring a Nepali meal set and seasonal sides.'],
    ['name'=>'Community Homestay Evening','type'=>'Stay Local','rating'=>4.7,'price'=>2200,'location'=>'Western Chitwan','image'=>$IMG_FOREST,'description'=>'Demo community accommodation listing with dinner and host interaction.'],
    ['name'=>'Handicraft & Gift Walk','type'=>'Shop Local','rating'=>4.4,'price'=>500,'location'=>'Bharatpur market area','image'=>$IMG_CANOE,'description'=>'Prototype route supporting small shops and locally made products.'],
    ['name'=>'Local Guide Nature Walk','type'=>'Experience Local','rating'=>4.8,'price'=>1300,'location'=>'Chitwan tourism zone','image'=>$IMG_ELEPHANT,'description'=>'Demo guided walk emphasizing responsible wildlife viewing and local knowledge.'],
];

$events = [
    ['name'=>'Bharatpur Local Food Weekend (Demo)','date'=>'Demo date: 2026-10-10','type'=>'Food','location'=>'Central Bharatpur','image'=>$IMG_BOATS,'description'=>'Prototype event card for hackathon demonstration; not an official event listing.'],
    ['name'=>'Riverfront Culture Evening (Demo)','date'=>'Demo date: 2026-10-17','type'=>'Cultural','location'=>'Narayani riverfront area','image'=>$IMG_CANOE,'description'=>'Prototype cultural program entry; confirm real schedules with organizers.'],
    ['name'=>'Nature Photography Walk (Demo)','date'=>'Demo date: 2026-11-01','type'=>'Adventure','location'=>'Bharatpur nature route','image'=>$IMG_FOREST,'description'=>'Prototype guided photography event for demonstration only.'],
];

$emergencyServices = [
    ['name'=>'Police Assistance (Demo)','category'=>'Police','location'=>'Bharatpur','contact'=>'Demo — verify official number locally'],
    ['name'=>'Hospital Assistance (Demo)','category'=>'Hospital','location'=>'Bharatpur','contact'=>'Demo — use verified hospital contact'],
    ['name'=>'Fire Service Assistance (Demo)','category'=>'Fire Service','location'=>'Bharatpur','contact'=>'Demo — verify official number locally'],
    ['name'=>'24-hour Pharmacy Finder (Demo)','category'=>'Pharmacy','location'=>'Bharatpur','contact'=>'Demo directory listing'],
    ['name'=>'ATM Finder (Demo)','category'=>'ATM','location'=>'Central Bharatpur','contact'=>'Demo directory listing'],
    ['name'=>'Transport Help (Demo)','category'=>'Transportation','location'=>'Bharatpur','contact'=>'Demo directory listing'],
];
