<?php
use Behat\Behat\Context\BehatContext;
use Behat\Gherkin\Node\PyStringNode;

use Behat\Mink\Mink,
    Behat\Mink\Session,
    Behat\Mink\Driver\Selenium2Driver,
    Behat\MinkExtension\Context\MinkContext;

use Selenium\Client as SeleniumClient;

require_once 'C:/Users/Tomas/OneDrive/Work/_LIB_SHARED/phpUnit/phpUnit_4.6/phpunit-4.6/src/Framework/Assert/Functions.php';

//require_once 'PHPUnit/Autoload.php';
//require_once 'PHPUnit/Framework/Assert/Functions.php';

class GuiContext extends MinkContext
{

  /**
   * @Given /^wait (\d+) seconds?$/
   */
  public function waitSeconds($arg1)
  {
    $this->getSession()->wait(1000 * $arg1);
  }

  /**
   * @Given /^Maximize the browser window$/
   */
  public function maxWindow()
  {
    $this->getSession()->getDriver()->resizeWindow(1900, 1020, 'current');
  }


  /**
   * Click on the element with the provided CSS Selector
   *
   * @When /^I click on the element with css selector "([^"]*)"$/
   */
  public function iClickOnTheElementWithCSSSelector($cssSelector)
  {
    $session = $this->getSession();
    $element = $session->getPage()->find(
        'xpath',
        $session->getSelectorsHandler()->selectorToXpath('css', $cssSelector) // just changed xpath to css
    );
    if (null === $element) {
      throw new \InvalidArgumentException(sprintf('Could not evaluate CSS Selector: "%s"', $cssSelector));
    }

    $element->click();

  }

  /**
   * Click some text
   *
   * @When /^I click on the text "([^"]*)"$/
   */
  public function iClickOnTheText($text)
  {
    $session = $this->getSession();
    $element = $session->getPage()->find(
        'xpath',
        $session->getSelectorsHandler()->selectorToXpath('xpath', '*//*[text()="' . $text . '"]')
    );
    if (null === $element) {
      throw new \InvalidArgumentException(sprintf('Cannot find text: "%s"', $text));
    }

    $element->click();
  }
}

    