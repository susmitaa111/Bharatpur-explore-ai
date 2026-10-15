const BharatpurApp = (() => {
  const dictionary = {
    ne:{Home:'गृहपृष्ठ',Explore:'अन्वेषण','Plan My Trip':'यात्रा योजना',Map:'नक्सा','Local Experiences':'स्थानीय अनुभव',Events:'कार्यक्रम',Saved:'सुरक्षित',Search:'खोज्नुहोस्','View Details':'विवरण हेर्नुहोस्','Create My Itinerary':'मेरो यात्रा योजना बनाउनुहोस्'},
    hi:{Home:'होम',Explore:'खोजें','Plan My Trip':'यात्रा योजना',Map:'मानचित्र','Local Experiences':'स्थानीय अनुभव',Events:'कार्यक्रम',Saved:'सहेजा गया',Search:'खोजें','View Details':'विवरण देखें','Create My Itinerary':'मेरी यात्रा बनाएं'}
  };
  function toast(message){const el=document.getElementById('appToast');if(!el)return;el.querySelector('.toast-body').textContent=message;bootstrap.Toast.getOrCreateInstance(el).show()}
  function saved(){try{return JSON.parse(localStorage.getItem('bharatpur_saved')||'[]')}catch(e){return[]}}
  function toggleSave(place){let items=saved();const i=items.findIndex(x=>String(x.id)===String(place.id));if(i>=0){items.splice(i,1);toast('Removed from saved places')}else{items.push(place);toast('Added to your saved places ❤️')}localStorage.setItem('bharatpur_saved',JSON.stringify(items));window.dispatchEvent(new Event('savedUpdated'));return i<0}
  function setLanguage(lang){localStorage.setItem('bharatpur_lang',lang);document.documentElement.lang=lang;document.getElementById('langName')?.replaceChildren(document.createTextNode(lang==='ne'?'ने':lang==='hi'?'हि':'EN'));document.querySelectorAll('[data-i18n]').forEach(el=>{const key=el.dataset.i18n;el.textContent=(dictionary[lang]&&dictionary[lang][key])||key})}
  function init(){document.querySelectorAll('.lang-option').forEach(b=>b.addEventListener('click',()=>setLanguage(b.dataset.lang)));setLanguage(localStorage.getItem('bharatpur_lang')||'en');document.querySelectorAll('[data-save-place]').forEach(btn=>btn.addEventListener('click',()=>{toggleSave(JSON.parse(btn.dataset.savePlace));btn.innerHTML='<i class="fa-solid fa-heart"></i>'}));document.querySelectorAll('[data-confirm]').forEach(el=>el.addEventListener('click',e=>{if(!confirm(el.dataset.confirm))e.preventDefault()}));}
  return {init,toast,saved,toggleSave,setLanguage};
})();
document.addEventListener('DOMContentLoaded',BharatpurApp.init);
