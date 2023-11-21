const listNav = document.querySelectorAll('.nav-list li')

listNav.forEach(item => {
    item.addEventListener('click',(event) => {
        listNav.forEach(item => item.classList.remove('active-nat-item'))
        item.classList.add('active-nat-item')    
    })
})