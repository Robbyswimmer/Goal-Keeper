# Goal-Keeper

Goal Keeper is a website to help people keep track of their goals. It can be used to create goals, monitor goals, view statistics about your goals, and view your history of goal completion. It is completely free and it exists because I believe that writing goals is an incredibly important part of life and should be easily accessible to all people.

![Goal Keeper](/gk-images/home.png)

## Purpose

The purpose of Goal Keeper is to make it simple and easy to keep track of your goals digitally. Writing Goals has become a big part of my life and is what keeps me on track to do the things that I want to do, but writing goals is in desperate need of a modern update. I hope that Goal Keeper can fill this void, and assist people in keeping track of their goals in a way that feels comfortable and user-friendly to them. While writing your goals down on paper can be effective, there is no reason to not make this process better by allowing you to access them on your phone, computer, or any other device that you have with web access. Additionally, with Goal Keeper not only can you see your goals, but you can track your progress, change your goals to reflect your current needs, and give your goals ratings so that you will know how how close you are to accomplishing them.

## Technology and Implementation

Goal Keeper was built with the following technologies:

* PHP
* JavaScript
* MySQL
* HMTL
* CSS
* Bootstrap
* Plotly JavaScript Library

One particular feature of interest for the implementation of this project is the way that individual goals are handled. Given that each user will be generating long lists of goals with different types, descriptions, ratings, id's, and timestamps – the most important part of this website was determining how to handle all of these goals. When a user creates a goal, that goal is inserted into the database and then a card is dynamically generated for that database entry to reflect the new goal. That goal is then displayed on the page dynamically where it is organized with the other goals. Each card has a dynamically generated modal, title, description, and the rating for each goal is set to `null` by default until it is given a rating by a user.

![Goal Keeper](/gk-images/example.png)

Notes: PHP is used to handle anything server or user-information related, while JavaScript handles some of the page formatting and is also responsible for producing the graphs on the home page. Bootstrap's grid system provides easy, and consistent page formatting and reliable scaling between mobile and desktop versions of the site. Plotly is a JavaScript library that allows data to easily be formatted and graphed according to the needs of the data. Goal Keeper uses a 1-10 scale for rating goals, so the most effective portrayal of this data is to use a barchart for individual goals. 

## Features

* Create Goals based on how long it will take to accomplish them (day, week, month, year, all-time)
  * Give your goals titles, descriptions, other relevant information so you know exactly what your goal is

* Track and monitor your goals however you feel is best
  * Add journal entries to goals
 * Give your goals ratings
 * Edit your goals to reflect your changing needs overtime
 * Mark your goals as complete once you have achieved them
 * Delete your goals if they are no longer relevant or if you have moved on from them

* View useful statistics about your goal progress
 * View bar charts to reflect your goal progress on the 'Home' page
 * Sort goals by type to find weaknesses in your goal setting strategies

* View all of the goals you have completed to see how many of your goals you have completed
 * Sort goals by type, or view all goals at once to see how your hard work has paid-off

![Goal Keeper](/gk-images/completed.png)

## Try Goal Keeper

Goal Keeper can be demoed right now at the following link: http://robbymoseley.com/gk/signin.php

While all features are fucntional, the current version of Goal Keeper is in development so not everything will be completely polished. All passwords are encrypted.

