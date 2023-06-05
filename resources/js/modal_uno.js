console.warn('hola que tal este es modal uno....');
// document.getElementById('myModal').showModal();

    let bt_abrir_modal = document.getElementById('bt_abrir_modal');
    // console.log(bt_abrir_modal);
    bt_abrir_modal.addEventListener('click', e => {
        //prevenir el evnto que viene por efauld
        e.preventDefault();
        console.warn('abrir modal!');
       document.getElementById('myModal').showModal();
    });

    let bt_cerrar_modal = document.getElementById('bt_cerrar_modal');
    bt_cerrar_modal.addEventListener('click', e => {
        //prevenir el evnto que viene por efauld
        e.preventDefault();
        console.warn('cerrar  modal!');
        document.getElementById('myModal').close();
    });


    /* disenio
    <dialog id="myModal" class="modal_open w-1/2 h-3/4 p-3 rounded-2xl ">
        <button id="bt_cerrar_modal" type="button"
        class="cursor-pointer absolute top-0 right-0 mt-2 mr-2 text-gray-500 hover:text-gray-700 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x"
            width="20" height="20" viewBox="0 0 24 24" stroke-width="2.5"
            stroke="currentColor" fill="none" stroke-linecap="round"
            stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" />
            <line x1="18" y1="6" x2="6" y2="18" />
            <line x1="6" y1="6" x2="18" y2="18" />
        </svg>
        </button>
        @include('VistasTenancyInquilinos.Creditos.modal_tipos_credito')
     </dialog>
    */

