# How to use Honeypot for Brevo

1. Download the `mailin-honeypot.zip` file from the latest release.
2. Activate the plugin
3. Add a hidden `input` field to your Brevo signup form, named `come_and_get_it`, e.g.
   ````
   <input type="hidden" name="come_and_get_it" value="" />
   ````
4. Done!

Most spambots will always attempt to enter values in all fields. If the `come_and_get_it` field has a value, that means it's a bot and the form won't
be submitted.

You can modify the name of the field yourself, by using the `brevo_honeypot_name` filter (recommended).