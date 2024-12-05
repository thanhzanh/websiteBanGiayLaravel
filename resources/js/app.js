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

// Thêm sản phẩm vào giỏ hàng
// btn-add-cart
// let btnAddCart = document.querySelector("[btn-add-cart]");
// const decreaseButton = document.querySelector("[decrease-quantity]");
// const increaseButton = document.querySelector("[increase-quantity]");
// const quantityInput = document.querySelector("[quantity]");
// const formAddCart = document.querySelector('[form-add-cart]');
// let sizeId = null;
// if (btnAddCart) {
//     let listSizes = document.querySelectorAll("[btn-sizes]");
//     listSizes.forEach((size) => {
//         size.addEventListener("click", () => {
//             // khi chọn size
//             sizeId = size.value;

//             listSizes.forEach((btn) => {
//                 btn.classList.remove("selected");
//             });

//             // Thêm lớp 'selected' vào button size hiện tại
//             size.classList.add("selected");

//         });
//     });

//     decreaseButton.addEventListener("click", () => {
//         let currentQuantity = parseInt(quantityInput.value);
//         if (currentQuantity > 1) {
//             currentQuantity--;
//             quantityInput.value = currentQuantity;
//         }
//     });

//     increaseButton.addEventListener("click", () => {
//         let currentQuantity = parseInt(quantityInput.value);
//         currentQuantity++;
//         quantityInput.value = currentQuantity;
//     });

//     btnAddCart.addEventListener("click", (e) => {
//         if (sizeId == null) {
//             alert("Vui long chon kich co truoc khi them vao gio hang");
//             return;
//         }

//         const productId = btnAddCart.getAttribute("data-product-id");

//         const quantity = parseInt(quantityInput.value);


//         // data của cart
//         const dataCart = {
//             product_id: productId,
//             size: sizeId,
//             quantity: quantity,
//         };

//         // console.log(dataCart);
//         fetch('/cart/add/${productId}', {
//           method: 'POST',
//           headers: {
//               'Content-Type': 'application/json',
//               'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'), // Lấy CSRF token
//           },
//           body: JSON.stringify(dataCart) // Gửi dữ liệu
//       })
//       .then(response => response.json())
//       .then(data => {
//           if (data.success) {
//               alert('Sản phẩm đã được thêm vào giỏ hàng!');
//           } else {
//               alert('Đã có lỗi xảy ra!');
//           }
//       })
//       .catch(error => {
//           console.error('Error:', error);
//           alert('Đã có lỗi xảy ra!');
//       });
      

//     });
// }

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
