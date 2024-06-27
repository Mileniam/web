const menu = document.querySelector('.menu');

    window.addEventListener('scroll', function(){
        menu.classList.toggle('active', this.window.scrollY >0)
    })