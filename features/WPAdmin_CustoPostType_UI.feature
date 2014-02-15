Feature: WP Admin / Custom Post Type
  Pridani custom post types do WP admin

  @javascript
  Scenario: Uzivatel by mel videt v menu WP admin polozku "Galeries"
    Given I am on "http://wp_br.dev/site/web/wp/wp-admin/"
    And Maximize the browser window
    When I fill in "Username" with "admin"
    When I fill in "Password" with "root"
    And I press "Log In"
    Then I should see "Galleries" in the "div #adminmenu" element
#    Then wait 5 seconds

  @javascript
  Scenario: Uzivatel by mel videt v menu WP admin pod polozkou Galeries, polozku taxonomie "Photographers"
    Given I am on "http://wp_br.dev/site/web/wp/wp-admin/"
    And Maximize the browser window
    When I fill in "Username" with "admin"
    When I fill in "Password" with "root"
    And I press "Log In"
    And I click on the text "Galleries"
    And I click on the text "All Galleries"
    Then I should see "Photographers" in the "div #adminmenu" element
#    Then wait 5 seconds

  @javascript
  Scenario: Uzivatel by mel videt v menu WP admin pod polozkou Galeries / Add New Gallery metabox "Photos Collection"
    Given I am on "http://wp_br.dev/site/web/wp/wp-admin/post-new.php?post_type=twp_post__ph_gallery"
    And Maximize the browser window
    When I fill in "Username" with "admin"
    When I fill in "Password" with "root"
    And I press "Log In"
    Then I should see "Photos Collection" in the "div #poststuff" element
#    Then wait 3 seconds






