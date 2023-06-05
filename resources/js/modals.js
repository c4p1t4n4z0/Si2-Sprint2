console.log('hola que tal....');

let cantidad = document.getElementById('cantidad').value;
// console.log('la cantidad es: '+cantidad)
for (let i = 0; i < cantidad; i++) {
    let bt_abrir_modal = document.getElementById('bt_abrir_modal'+i);
    // console.log(bt_abrir_modal);
    bt_abrir_modal.addEventListener('click', e => {
        //prevenir el evnto que viene por efauld
        e.preventDefault();
        console.warn('abrir modal!');
       document.getElementById('myModal'+i).showModal();
    });

    let bt_cerrar_modal = document.getElementById('bt_cerrar_modal'+i);
    bt_cerrar_modal.addEventListener('click', e => {
        //prevenir el evnto que viene por efauld
        e.preventDefault();
        console.warn('cerrar  modal!');
        document.getElementById('myModal'+i).close();
    });
}//end del for de los modale

