//get input values
const fname = document.getElementById('firstname'); 
const lname = document.getElementById('lastname'); 
const email = document.getElementById('email'); 
const password = document.getElementById('pword'); 
const role = document.getElementById('role'); 


//save button
const saveBtn = document.getElementById('save-btn'); 
 
form.addEventListener('click', e => { 
  // Code to save data goes here 
  e.preventDefault();
  validateInputs();

  console.log('Data saved!'); 
}); 


const setError = (element,message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')

}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};


const isValidEmail = email => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

const isValidPassword = password => {
    const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    return passwordRegex.test(password);
}



const validateInputs = () => {
    fnameValue = fname.value.trim();
    lnameValue = lname.value.trim();
    emailValue = email.value.trim();
    passwordValue = password.value.trim();

    if(fnameValue === '') {
        setError(fname, 'Required');
    } else {
        setSuccess(fname);
    }

    if(lnameValue === '') {
        setError(fname, 'Required');
    } else {
        setSuccess(fname);
    }

    if(emailValue === '') {
        setError(email, 'Email is required');
    } else if (!isValidEmail(emailValue)) {
        setError(email, 'Provide a valid email address');
    } else {
        setSuccess(email);
    }

    

    if(passwordValue === '') {
        setError(password, 'Password is required');
    } else if (isValidPassword(passwordValue) ) {
        setError(password, 'Please provide a valid password. Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.')
    } else {
        setSuccess(password);
    }

    



}