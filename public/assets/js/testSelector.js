function testQuerySelector() {
    let elements;
    elements = $(document).find("input[name^='photo']");
    elements.each(function (index) {
        $(this).val(index);
    });
}