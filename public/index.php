<?php require_once("../includes/braintree_init.php"); ?>

<html>
<?php require_once("../includes/head.php"); ?>
<body>

    <?php require_once("../includes/header.php"); ?>

    <div class="wrapper">
        <div class="checkout container">

            <header>
                <h1>ST Braintree Sandbox</h1>
                <p>
                    Use PayPal or a card
                </p>
                <p>
                    4111 1111 1111 1111
                </p>
            </header>

            <form method="post" id="payment-form" action="/get_nonce.php">
                <section>
                    <div class="bt-drop-in-wrapper">
                        <div id="bt-dropin"></div>
                    </div>

                    <label for="amount">
                        <span class="input-label">Amount</span>
                        <div class="input-wrapper amount-wrapper">
                            <input id="amount" name="amount" type="tel" min="1" placeholder="Amount" value="100">
                        </div>
                    </label>
                </section>

                <button class="button" type="submit"><span>Generate a nonce</span></button>
            </form>
        </div>
    </div>

    <script src="https://js.braintreegateway.com/js/braintree-2.27.0.min.js"></script>
    <script>
        var checkout = new Demo({
            formID: 'payment-form'
        })
        var client_token = "<?php echo(Braintree\ClientToken::generate()); ?>";
        braintree.setup(client_token, "dropin", {
            container: "bt-dropin"
        });
    </script>
</body>
</html>
