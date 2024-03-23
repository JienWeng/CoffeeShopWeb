document.addEventListener('DOMContentLoaded', function(){
    const loginForm = document.getElementById('login-form');
    const registerForm = document.getElementById('register-form');
    const showRegisterLink = document.getElementById('show-register');
    const showLoginLink = document.getElementById('show-login');
    showRegisterLink.addEventListener('click',function(e){
        e.preventDefault();
        document.getElementById('login-ctn').style.display = 'none';
        document.getElementById('register-ctn').style.display = 'block';
    });

    showLoginLink.addEventListener('click',function(e){
        e.preventDefault();
        document.getElementById('register-ctn').style.display = 'none';
        document.getElementById('login-ctn').style.display = 'block';
    });

    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const username = document.querySelector('.login-user').value;
        const password = document.querySelector('.login-pass').value;
        console.log('Logging in with username:', username, 'and password:', password);
    });

    registerForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const firstname = document.querySelector('.first-name').value;
        const lastname = document.querySelector('.last-name').value;
        const username = document.querySelector('.reg-user').value;
        const email = document.querySelector('.reg-email').value;
        const password = document.querySelector('.reg-password').value;
        const confirmPassword = document.querySelector('#confirm-password').value

        if(password!== confirmPassword){
            alert("Passwords do not match !");
            return;
        }

        console.log('Registering with username:', username,'email: ',email, 'and password:', password);
        
    
        
        
    });
});