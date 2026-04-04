Task 1: Explanation

When a user submits an email via an HTML form, it sends a POST request to a Laravel route. The route captures this input and uses "session()->push()" to save it into a temporary array. Finally, the page redirects and refreshes, using a Blade "ForEach" loop to display the updated list from the session.



Reflection Questions:



1. GET is used to request data from the server, and its parameters are visible in the URL. POST is used to send sensitive or new data to the server, it is more secure because the data is hidden inside the request body and not shown in the browser's address bar.
2. We use the @csrf directive to protect the application from Cross-Site Request Forgery attacks. It generates a unique, hidden security token that proves the request is coming from your actual website and not from a malicious third party trying to hijack the user's session.
3. In this activity, the session acts as a temporary, server-side storage area. Since HTTP is stateless, the session allows us to remember the list of emails as the user adds or deletes them without needing a permanent database like MySQL.
4. If the session is cleared, all stored data is immediately wiped out. In the context of this project, your list of emails will disappear, any "success" or "error" flash messages will be lost, and the application will reset to its original, empty state as if a new user just arrived.

