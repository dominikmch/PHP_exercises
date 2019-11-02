<?php
// Creating HTML page with web form using classes

class WebPageOutput
{
    private $page_header;
    private $page_body;
    private $page_footer;
    public function createOutputFooter()
    { $this->page_footer = <<< FOOTER
        </html>
        FOOTER;
    }

    public function createOutputBody()
    { $this->page_body= <<<BODY
     <form method="post" action="primeNumbers.php" >
     <p>Enter a number to be tested as prime</p>
     <input type="text" name="number" maxlength="10">
      <input type="submit" name="form_submit"
      value="Submit">
      </form>
    BODY;
    }
    public function  createOutputHeader()
    { $this->page_header=<<< HEADER
        <!doctype html>
        <html lang=”en”>
        <head>
        <meta http-equiv="Content-Type"
        content="text/html; charset=utf-8">
        <meta name="Author" content="Dominik Michalski">
        </head>
        HEADER;

    }
    public function generateWebpage()
    {   $page='';
        $this->createOutputHeader();
        $this->createOutputBody();
        $this->createOutputFooter();
        $page .= $this->page_header;
        $page .= $this->page_body;
        $page .= $this->page_footer;
        return $page;
    }
}