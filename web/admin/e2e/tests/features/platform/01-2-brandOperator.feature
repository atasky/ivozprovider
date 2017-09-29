@platform
@brandOperators

Feature: Brand operator admin page
  As a main operator
  I want to be able to access domains admin page
  In order to check and manage them

Background:
  Given I go to the admin page
   When I send valid admin credentials
   Then I am logged in
   When I click on "Brands" CTA
   Then I am on "Brands" list
    And I can see at least one row
   When I click on "Brands" first elements "brandOperators" button
   Then I am on "BrandsList_brandOperators" subscreen list

Scenario: I see new brand operator admin page
  When I click on add button
   And I fill out the form with "platform/brandOperators/new" data fixture
   And I click on save button
  Then I can see confirmation dialog
  When I click on close dialog button
  Then I am on "BrandsList_brandOperators" subscreen list

Scenario: I can save brand operators
  Given I can see at least one row
   When I click on "BrandOperators" first elements edit button
    And I click on save button
   Then I can see confirmation dialog
   When I click on close dialog button
   Then I am on "BrandsList_brandOperators" subscreen list

Scenario: I can click on delete brand operator button
  Given I can see at least one row
   When I click on "BrandOperators" first elements delete button
   Then I can see confirmation dialog
   When I click on close dialog button
   Then I am on "BrandsList_brandOperators" subscreen list