
$('.dropdown')
  .dropdown()
;

$("[id*='select']")
    .dropdown({
        match: 'both',
        placeholder: 'auto',
        selectOnKeydown: 'true',
        keepOnScreen: 'true',
        allowTab: 'true',
        showOnFocus: 'true',
        fullTextSearch: 'true'
    });
