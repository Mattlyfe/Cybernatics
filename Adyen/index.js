function adyen_payment(){
    // Set your X-API-KEY with the API key from the Customer Area.
    const {Client, Config, CheckoutAPI} = require('@adyen/api-library');
    const config = new Config();
    // Set your X-API-KEY with the API key from the Customer Area.
    config.apiKey = 'AQEqhmfuXNWTK0Qc+iSXn2Uxq8WYS4RYA4ceCT0jD3GZH8aLeUIshJ+gcZqeEMFdWw2+5HzctViMSCJMYAc=-B4PJDpHC1ZXSAfoZxNI/pbr4DX/BTnm8jCaW4CJZ0BE=-zD~sp7NBfnQTTW<x';
    config.merchantAccount = 'GmailAccount418ECOM';
    const client = new Client({ config });
    client.setEnvironment("TEST");
    const checkout = new CheckoutAPI(client);
    checkout.payments({
        amount: { currency: "PHP", value: 1000 },
        paymentMethod: {
            type: 'gcash',
            storedPaymentMethodId: "7219687191761347"
        },
        reference: "sample 2",
        merchantAccount: config.merchantAccount,
        shopperReference: "YOUR_UNIQUE_SHOPPER_ID_IOfW3k9G2PvXFu2j",
        returnUrl: "https://your-company.com/checkout?shopperOrder=12xy..",
        shopperInteraction: "ContAuth",
        recurringProcessingModel: "Subscription"
    }).then(res => res).catch(res => console.log(res));
}

adyen_payment();