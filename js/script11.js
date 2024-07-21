let productName = document.getElementById('productName').value

function calAmount(a) {
    let amount = document.getElementById('amount11').value;
    let Amount = document.getElementById('amount');
    let dAmount = document.getElementById('dAmount');
    let dAmount1 = document.getElementById('dAmount1');
    let dAmount2 = document.getElementById('dAmount2');
    let quantity = document.getElementById('quantity');
    const newAmount = amount * a;
    quantity.value = a;
    Amount.value = newAmount;
    // dAmount.textContent = newAmount;
    dAmount1.textContent = newAmount;
    dAmount2.textContent = newAmount;

}

let cardCheckout = document.getElementById('cbtn');
const shopPay = document.getElementById('shopPay');
cardCheckout.addEventListener("click", payContinue);
shopPay.addEventListener("click", payAtShop);

function payContinue(e) {
    e.preventDefault();
    const customer = document.getElementById("customer").value;
    const a = document.getElementById("amount").value;
    const email = document.getElementById("email").value;
    const phone = document.getElementById("phone").value;
    const trf = document.getElementById("productId").value;
    const address = document.getElementById("address").value;
    const quantity = document.getElementById("quantity").value;
    let required = document.querySelector('#required');
    let required1 = document.querySelector('#required1');
    let required2 = document.querySelector('#required2');
    if (customer == "") {
        required.innerHTML = "<span style='color:red;'>Name is required!</span>"
        return;
    }
    if (phone == "") {
        required1.innerHTML = "<span style='color:red;'>Phone number is required!</span>"
        return;
    }
    if (email == "") {
        required2.innerHTML = "<span style='color:red;'>Email is required!</span>"
        return;
    }
    cardCheckout.innerHTML = "<span>Please Wait, Loading..</span>";
    const amount = Number(a);
    console.log("Data: ", customer, a, amount, email, phone, trf, quantity);
    // if(amount<500){
    //     return Swal.fire({
    //     title: "ERROR!",
    //     text: "The minimum amount allow to top up is 500 Naira.",
    //     icon: "error",
    //     // button: "Ok",
    //     }).then(()=>cardTopup.value="Proceed")
    // }
    FlutterwaveCheckout({
        public_key: "FLWPUBK-f9b491aa7863be14a97e483bd9c75f74-X",
        tx_ref: trf,
        amount: amount,
        currency: "NGN",
        payment_options: "card, account, ussd",
        callback: function(payment) {
            console.log(payment);
            //this happens after the payment is completed successfully
            const reference = payment.tx_ref;
            const pStatus = payment.status;
            const amt = payment.amount;
            console.log("amount:", payment.amount, reference, pStatus);
            // window.location = "https://comelive.com.ng/home.php?ref=" + reference + "&status=" + pStatus + "&am=" + a;


        },
        // redirect_url: "http://localhost:9090/beauty-contest/count-votes.php", //"https://glaciers.titanic.com/handle-flutterwave-payment",
        meta: {
            consumer_id: customer + trf,
            consumer_mac: "92a3-912ba-1192a",
        },
        customer: {
            email: email,
            phone_number: phone,
            name: customer,
        },
        customizations: {
            title: "Bossmann Technologies Ltd.",
            description: "Payment for " + productName,
            logo: "data:image/jpeg;base64,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",
        },
    });
}

// pay at shop
function payAtShop(e) {
    // e.preventDefault();
    const customer = document.getElementById("customer").value;
    const a = document.getElementById("amount").value;
    const email = document.getElementById("email").value;
    const phone = document.getElementById("phone").value;
    const trf = document.getElementById("productId").value;
    const address = document.getElementById("address").value;
    const quantity = document.getElementById("quantity").value;
    let required = document.querySelector('#required');
    let required1 = document.querySelector('#required1');
    let required2 = document.querySelector('#required2');
    if (customer == "") {
        required.innerHTML = "<span style='color:red;'>Name is required!</span>"
        return;
    }
    if (phone == "") {
        required1.innerHTML = "<span style='color:red;'>Phone number is required!</span>"
        return;
    }
    if (email == "") {
        required2.innerHTML = "<span style='color:red;'>Email is required!</span>"
        return;
    }
    console.log("I am here")
    shopPay.textContent = "Loading, please wait.."
}