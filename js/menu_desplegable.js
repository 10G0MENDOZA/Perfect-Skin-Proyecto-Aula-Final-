const menubtn = document.querySelector('.menubtn')
    const navlinks = document.querySelector('.navlinks')

    menubtn.addEventListener('click' ,()=>{
        navlinks.classList.toggle('movil-menu')
    })
       