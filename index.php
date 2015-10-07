<?php
require 'vendor/autoload.php';

// TODO : Enter your LaunchDarkly API key here
$client = new LaunchDarkly\LDClient("YOU_API_KEY");

$builder = (new LaunchDarkly\LDUserBuilder("bob@example.com"))
  ->firstName("Bob")
  ->lastName("Loblaw")
  ->custom(["groups" => "beta_testers"]);

$user = $builder.build();

// TODO : Enter the key for your feature flag here
if ($client->toggle("YOUR_FEATURE_FLAG_KEY", $user, false)) {
  // application code to show the feature
  echo "Showing your feature to " . $user->key . "\n";
} else {
  // the code to run if the feature is off
  echo "Not showing your feature to " . $user->key . "\n";
}

$client->flush();
?>