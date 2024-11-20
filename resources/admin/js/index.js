// sidebar menu
// const itemsMenu = document.querySelectorAll('.siderbar-menu ul li');
// if(itemsMenu.length > 0) {
//     itemsMenu.forEach(item => {
//         item.addEventListener('click', (e) => {
//             e.preventDefault();
//             itemsMenu.forEach(i => i.classList.remove('selected'));
//             item.classList.add('selected');
//             console.log(item);
//         });

//     });
// }

// end sidebar menu

// changeStatus product-category
const buttonChangeStatus = document.querySelectorAll('.button-change-status');
if (buttonChangeStatus.length > 0) {

    buttonChangeStatus.forEach(button => {
        
        button.addEventListener('click', () => {
            const statusCurrent = button.getAttribute('data-status');
            const idCurrent = button.getAttribute('data-id');

            let statusChange = statusCurrent === "active" ? "inactive" : "active";

            const formChangeStatus = button.closest('.form-change-status');

            let action = formChangeStatus.getAttribute('action');
            action = action.replace(statusChange, idCurrent, `${statusChange}/${idCurrent}`);

            formChangeStatus.action = action;

            formChangeStatus.submit();
        });       
    });
}

// end changeStatus product-category

// show status: Tat ca, hoat dong, dung hoat dong
const buttonStatus = document.querySelectorAll('[button-status]');
console.log(buttonStatus);
if (buttonStatus.length > 0) {

    // lay ra url, them key thay doi params url
    let url = new URL(window.location.href);

    buttonStatus.forEach(button => {
        button.addEventListener('click', () => {
            const status = button.getAttribute('button-status');
            console.log(status);

            if(status) {
                url.searchParams.set('status', status);
            } else {
                url.searchParams.delete('status');
            }

            // gan lai url
            window.location.href = url;
        });
    });
    
}

// end show status



