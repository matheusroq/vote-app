const numeroCampos = document.querySelector("#num-fields");
const btn = document.querySelector("#btn");
const campos = document.querySelector("#fields");
let created = false;

btn.addEventListener("click", () => {
    const n = numeroCampos.value
    if(created == false) {
        for (let i = 0; i < n; i++) {
            let input = document.createElement('input');
            input.setAttribute('name', `name${i}`);
            input.style.display = 'block'
            input.style.marginTop = '10px'
            campos.appendChild(input);
        }
        const button = document.createElement('button')
        button.innerHTML = 'Create'
        button.className = 'btn-create'
        campos.appendChild(button)
    } else {
        alert('Fields alredy created.')
    }
    
    created = true;
})
