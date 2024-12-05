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
      
      const product_id = input.getAttribute('product-id');
      const quantity = input.value;

      console.log(product_id);
      console.log(quantity);
      
      // gui len duong dan product_id va quantity de cap nhat
      window.location.href = `/cart/update/${quantity}/${product_id}`;
    });
  });
}
