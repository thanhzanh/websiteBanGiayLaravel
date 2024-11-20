import './bootstrap';
import tinymce from 'tinymce/tinymce';
import 'tinymce/themes/silver/theme';
import 'tinymce/icons/default/icons';

tinymce.init({
    selector: 'textarea#myeditorinstance',
    plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
    height: 500, // Đặt chiều cao cho trình soạn thảo
    menubar: false // Tùy chọn để ẩn thanh menu nếu không cần thiết
});
