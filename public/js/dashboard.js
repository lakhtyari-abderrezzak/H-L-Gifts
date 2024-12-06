const aside = document.querySelector('.aside');

// aside.onlick = function(){
//     if(aside.classList.contains('active')){
//         aside.classList.remove('active');
//     }else{
//         aside.classList.add('active');
//     }
// }
aside.addEventListener('click', ()=>{
    aside.classList.toggle('active');
})