Feature: Testovani funkcnosti custom post type Photo Gallery

  @javascript
  Scenario:
    Given I am on "http://wp_br.dev/twp-post--ph-gallery/usa-2011/"
    And Maximize the browser window
    Then I should see "Photo Gallery" in the "h1" element
