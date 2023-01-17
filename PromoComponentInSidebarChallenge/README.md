## Challenge! Add a new UI Component to the Order Summary checkout
Here is a challenge for you. In this task, you'll use your previous knowledge of UI Components and layout XML to implement this task.

I'll provide you with some general guidelines, but it's up to you to implement this task.

### User Story / Summary
As a visitor, I'd like to see a message that notifies me when I'm under $100 of items in my cart, and when I meet that criteria, it should show me a promo code to use for 10% off my entire order.

### Details
Create a new component in the checkout sidebar. If there is under $100 of items in my cart (subtotal), I should see the message:

"Add $XX.XX of items to your cart to receive a promo code for 10% off your entire order."

This message should only be displayed during the Shipping step, or earlier, of the checkout process.

## Once the user reaches a $100 subtotal of items in their cart, display the message:

"Congrats! Use promo code GET100 for 10% off your entire order."

## Visual Mockup
This custom component should be displayed in the sidebar order summary component, below the "Order Summary" heading and above the "X Items in Cart" text:


![Alt text](/var/www/html/magento/app/code/MageChamps/PromoComponentInSidebarChallenge/view/frontend/web/images/promo-component.png "a title")


Implement the most non-invasive method of adding a custom UI component & template to this area.

Hint: Look at the Magento_Checkout::view/frontend/layout/checkout_index_index.xml layout XML for hints on how to accomplish this task.
### Estimate
~8 hours



When you are complete, be sure to submit your code in Campus for a chance to win M swag (a t-shirt or hoodie!).


