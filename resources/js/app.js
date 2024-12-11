import "./bootstrap";
import tinymce from "tinymce/tinymce";
import "tinymce/themes/silver/theme";
import "tinymce/icons/default/icons";

tinymce.init({
    selector: "textarea#myeditorinstance",
    plugins:
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
    toolbar:
        "undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table",
    height: 500, // Đặt chiều cao cho trình soạn thảo
    menubar: false, // Tùy chọn để ẩn thanh menu nếu không cần thiết
});


// thêm sản phẩm vào giỏ hàng
let btnAddCart = document.querySelector("[btn-add-cart]");
const decreaseButton = document.querySelector("[decrease-quantity]");
const increaseButton = document.querySelector("[increase-quantity]");
const quantityInput = document.querySelector("[quantity]");
const formAddCart = document.querySelector("[form-add-cart]");
const sizeInput = document.querySelector("#size-input"); // Input ẩn cho size
const quantityHiddenInput = document.querySelector("#quantity-input"); // Input ẩn cho quantity
let sizeId = null;

if (btnAddCart) {
    let listSizes = document.querySelectorAll("[btn-sizes]");
    listSizes.forEach((size) => {
        size.addEventListener("click", (e) => {
            e.preventDefault();
            // khi chọn size
            sizeId = size.value;

            // Gán size vào input ẩn
            sizeInput.value = sizeId;

            // Đánh dấu size hiện tại được chọn
            listSizes.forEach((btn) => {
                btn.classList.remove("selected");
            });
            size.classList.add("selected");
        });
    });

    decreaseButton.addEventListener("click", (e) => {
        e.preventDefault();  
        let currentQuantity = parseInt(quantityInput.value);
        if (currentQuantity > 1) {
            currentQuantity--;
            quantityInput.value = currentQuantity;
            quantityHiddenInput.value = currentQuantity; // Cập nhật input ẩn
        }
    });

    increaseButton.addEventListener("click", (e) => {
        e.preventDefault();
        let currentQuantity = parseInt(quantityInput.value);
        currentQuantity++;
        quantityInput.value = currentQuantity;
        quantityHiddenInput.value = currentQuantity; // Cập nhật input ẩn
    });

    btnAddCart.addEventListener("click", (e) => {
      e.preventDefault(); // Ngăn hành động mặc định của nút
  
      // Kiểm tra nếu người dùng chưa chọn kích cỡ
      if (sizeId == null) {
          alert("Vui lòng chọn kích cỡ trước khi thêm vào giỏ hàng");
          return;
      }
  
      formAddCart.submit();
  });
  
}

// Cập nhật số lượng sản phẩm
const listInputQuantity = document.querySelectorAll('input[name="quantity"]');
if (listInputQuantity.length > 0) {
  listInputQuantity.forEach(input => {
    input.addEventListener("change", (e) => {
        e.preventDefault();
      
      const product_id = input.getAttribute('product-id');
      const quantity = input.value;

      console.log(product_id);
      console.log(quantity);
      
      // gui len duong dan product_id va quantity de cap nhat
      window.location.href = `/cart/update/${quantity}/${product_id}`;
    });
  });
}

// chuyển hình ảnh trang chi tiết sản phẩm
const thumbnails = document.querySelectorAll('.flex img[data-src]');
const mainImage = document.getElementById('mainImage');

// Lặp qua các hình phụ và gắn sự kiện click
thumbnails.forEach(thumbnail => {
    thumbnail.addEventListener('click', function () {
        // Lấy đường dẫn từ data-src và thay đổi src của hình chính
        const newSrc = this.getAttribute('data-src');
        mainImage.setAttribute('src', newSrc);
    });
});


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







