<?php
require('stripe-php-master/init.php');

$publishableKey="pk_test_51HMCnFGFO8mPWi2QshvqIeIqIUPnXeTKvMpx29frliJOy23k79oB06oQQaIE7EJbzaMw1giM3xJhj5VaA4RtZrsp00tuKwEMPl";

$secretKey="sk_test_51HMCnFGFO8mPWi2Q1iFenmG95EsSXawVPUigqL0INKhu2v4weuv1CnAexgUWKescrdppLdlhf3nIkAQx6vWOAToz00jVVVra5J";

\Stripe\Stripe::setApiKey($secretKey);
?>
