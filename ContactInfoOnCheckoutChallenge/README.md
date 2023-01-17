Challenge! Create a custom checkout UI Component for logged in users
Here is a challenge for you. In this task, you'll use your previous knowledge of UI Components and importing components to create a new component only displayed for logged in users.

I'll provide you with some general guidelines, but it's up to you to implement this task.

User Story / Summary
As a logged in customer, I'd like to be able to get assistance from the store's phone number during checkout.

Details
Create a new component at the top right of the screen that only displays for logged in users. The component should follow the format:

"Welcome {FIRST_NAME}! Need help? call us at {STORE_NUMBER}"

The {FIRST_NAME} value should be replaced by the value of the currently logged-in user's first name.

The {STORE_NUMBER} value should be replaced with the store's phone number, pulled out of the store configuration in Magento.

Display this content at the top right of the screen at checkout.

Visual Mockup
Logged out users are shown a "Sign In" link:

![Alt text](/var/www/html/magento/app/code/MageChamps/ContactInfoOnCheckoutChallenge/view/frontend/web/images/challenge.png "a title")


Logged in users are not shown this link. We should display this link only for logged in users in the same area as this Sign In link.

Estimate


