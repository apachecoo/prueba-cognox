let $root_account        = document.getElementById('root_account');
let $destination_account = document.getElementById('destination_account');
let $amount = document.getElementById('amount');

$root_account.addEventListener('change',(event)=>{
    if(event.target.value){
        $root_account.classList.remove('is-invalid');    
    }
})

$destination_account.addEventListener('change',(event)=>{
    if(event.target.value){
        $destination_account.classList.remove('is-invalid');    
    }
})

$amount.addEventListener('keyup',(event)=>{

    // alert(event.target.value);
})