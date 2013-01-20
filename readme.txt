=== Radium Contact Forms ===
Stable tag: 1.0
Requires at least: 3.0
Tested up to: 3.5

This plugin is based on Grunion Contact forms that ships with Jetpack by Automatic, Inc

Add a contact form to any post, page or text widget. Messages will be sent to any email address you choose. As seen on WordPress.com.

== Description ==

Add a contact form to any post or page by inserting '[contact-form]' in the post.  Messages will be sent to the post's author or any email address you choose.

Or add a contact form to a text widget.  Messages will be sent to the email address set in your Settings -> General admin panel or any email address you choose.

Your email address is never shown, and the sender never learns it (unless you reply to the email).

= Configuration =

The '[contact-form]' shortcode has the following parameters:

* 'to': A comma separated list of email addresses to which the messages will be sent.
  If you leave this blank: contact forms in posts and pages will send messages to the post or page's author; and
  contact forms in text widgets will send messages to the email address set in Settings -> General.

  Example: '[contact-form to="you@me.com"]'

  Example: '[contact-form to="you@me.com,me@you.com,us@them.com"]'

* 'subject': The e-mail subject of the message defaults to '[{Blog Title}] {Sidebar}' for text widgets
  and '[{Blog Title}] {Post Title}' for posts and pages. Set your own default with the subject option.

  Example: '[contact-form subject="My Contact Form"]'

* 'show_subject': You can allow the user to edit the subject by showing a new field on the form. The
  field will be populated with the default subject or the subject you have set with the previous option.

  Example: '[contact-form subject="My Contact Form" show_subject="yes"]'