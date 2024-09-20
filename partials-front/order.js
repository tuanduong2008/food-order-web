document.addEventListener('DOMContentLoaded', function(){
    document.querySelector('#check_full_name').addEventListener('keyup', function(){
        if(this.value.length >= 3)
            document.querySelector('#warning_name').innerHTML = '';
        else
            document.querySelector('#warning_name').innerHTML = 'Nội dung phải lớn hơn 2 kí tự!'; 
    });

    document.querySelector('#check_contact').addEventListener('keyup', function(){
        var contactValue = this.value.trim();  // Loại bỏ khoảng trắng ở đầu và cuối chuỗi
    
        if (contactValue === '') {
            document.querySelector('#warning_contact').innerHTML = 'Số điện thoại không được để trống!';
        } else if (contactValue.length === 10) {
            document.querySelector('#warning_contact').innerHTML = ''; // Số điện thoại hợp lệ
        } else {
            document.querySelector('#warning_contact').innerHTML = 'Số điện thoại không hợp lệ!';
        }
    });
    
    document.querySelector('#check_address').addEventListener('keyup', function(){
        if(this.value.trim() !== '')
            document.querySelector('#warning_address').innerHTML = '';
        else
            document.querySelector('#warning_address').innerHTML = 'Bạn phải nhập địa chỉ vào đây'; 
    });
    
    document.querySelector('#check_email').addEventListener('keyup', function(){
        if(isValidEmail(this.value))
            document.querySelector('#warning_email').innerHTML = '';
        else
            document.querySelector('#warning_email').innerHTML = 'Email không hợp lệ!';                        
    });
});
function isValidEmail(email) {
    var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}
