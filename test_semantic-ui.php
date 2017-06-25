<!DOCTYPE html>
<html>

<head>
    <?php include 'head.html' ?>
</head>

<body>

  <form class="ui form">
  <div class="two fields">
    <div class="field error">
      <label>Integer</label>
      <input name="integer" type="text" value="101">
    </div>
    <div class="field">
      <label>E-mail</label>
      <input name="email" type="text" value="jack@foo">
    </div>
  </div>
  <div class="two fields">
    <div class="field">
      <label>Decimal</label>
      <input name="decimal" type="text" value="1.1.1">
    </div>
    <div class="field">
      <label>Number</label>
      <input name="number" type="text" value="+200">
    </div>
  </div>
  <div class="two fields">
    <div class="field error">
      <label>URL</label>
      <input name="url" type="text" value="ww.fakeurl.com">
    </div>
    <div class="field">
      <label>RegEx</label>
      <input name="regex" type="text" value="joe">
    </div>
  </div>
  <div class="ui submit button">Submit</div>
  <div class="ui error message"></div>
</form>

<script src="js/validation_test.js"></script>

<hr>

    <div id="select-summary" class="ui compact selection dropdown">
        <input type="hidden" name="gender">
        <i class="dropdown icon"></i>
        <div class="default text">Gender</div>
        <div class="menu">
            <div class="item" data-value="male" data-text="Male">
                <i class="male icon"></i> Male
            </div>
            <div class="item" data-value="female" data-text="Female">
                <i class="female icon"></i> Female
            </div>
        </div>
    </div>
    <script src="js/dropdown.js"></script>
    <hr>

    <h1>Multiple Search Dropdown</h1>
    <select name="states" class="ui search multiple selection dropdown" multiple="" id="select-doctor">
        <option value="">States</option>
        <option value="AL">Alabama</option>
        <option value="AK">Alaska</option>
        <option value="AZ">Arizona</option>
        <option value="AR">Arkansas</option>
        <option value="CA">California</option>
        <option value="OH">Ohio</option>
        <option value="OK">Oklahoma</option>
        <option value="OR">Oregon</option>
        <option value="PA">Pennsylvania</option>
        <option value="RI">Rhode Island</option>
        <option value="SC">South Carolina</option>
        <option value="SD">South Dakota</option>
        <option value="TN">Tennessee</option>
        <option value="TX">Texas</option>
        <option value="UT">Utah</option>
        <option value="VT">Vermont</option>
        <option value="VA">Virginia</option>
        <option value="WA">Washington</option>
        <option value="WV">West Virginia</option>
        <option value="WI">Wisconsin</option>
        <option value="WY">Wyoming</option>
    </select>

    <script>
        $('#select-doctor')
            .dropdown({
                match: 'both',
                placeholder: 'auto',
                selectOnKeydown: 'true',
                keepOnScreen: 'true',
                allowTab: 'true',
                showOnFocus: 'true',
                fullTextSearch: 'exact',
            });
    </script>

    <hr>
    <h1>Search</h1>
    <div class="ui search">
        <div class="ui left icon input">
            <input class="prompt" type="text" placeholder="Search GitHub">
            <i class="github icon"></i>
        </div>
    </div>



</body>

</html>
