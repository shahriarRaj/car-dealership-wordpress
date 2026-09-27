# Crown Auto Deals WordPress package

Install `crown-auto-deals-theme` in `wp-content/themes/` and activate it. Install and activate `crown-auto-deals-core` in `wp-content/plugins/` first.

## Required pages
Create these pages and assign the indicated shortcode/content:
- Dashboard: `[cad_dashboard]`
- Login: `[cad_login]`
- Register: `[cad_register]`
- Contact: `[cad_contact_form]`
- About, Services, Terms, Privacy: normal WordPress content

Set **Settings → Reading** to use a static front page and assign a menu under **Appearance → Menus**. The plugin registers the Used Cars archive at `/used-cars/`; resave permalinks after activation.

## Sales workflow
Create a WordPress customer account, then create a **Transaction** in the admin. Set the customer user ID, vehicle post ID, amount, invoice URL, and warranty URL. The transaction appears only in that customer's dashboard. For production, use private/protected document storage and configure authenticated downloads rather than public file URLs.

## Google Ads
Add conversion tracking only after consent/configuration: place the Google tag through a consent-aware sitewide integration, and fire a `generate_lead` event on successful contact submission and a `purchase` event on the confirmed transaction page. Keep ad landing pages fast, use `/used-cars/` filters, and do not send personally identifiable customer data to Google.

## Security and production notes
Use HTTPS, regular updates, role-based permissions, backups, malware scanning, SMTP, privacy/consent compliance, and a protected document delivery endpoint before handling real customer paperwork. This package intentionally avoids page builders and third-party theme dependencies.
