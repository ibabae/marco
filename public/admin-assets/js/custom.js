function buildTree(data, parentElement) {
    // $.each(data, function(key, item) {
    data.forEach(item => {
        const listItem = document.createElement('li');
        const label = document.createElement('label');
        const checkbox = document.createElement('input');
        checkbox.setAttribute('type', 'checkbox');
        if(item.parent !== undefined){
            checkbox.setAttribute('id', `subcategory`+item.parent.id+`_${item.id}`);
            label.setAttribute('for', `subcategory`+item.parent.id+`_${item.id}`);
        } else {
            checkbox.setAttribute('id', `category${item.id}`);
            label.setAttribute('for', `category${item.id}`);
        }
        label.textContent = item.title;

        listItem.appendChild(checkbox);
        listItem.appendChild(label);

        if (item.children.length > 0) {
            const nestedList = document.createElement('ul');
            listItem.appendChild(nestedList);
            buildTree(item.children, nestedList);
        }

        parentElement.appendChild(listItem);
    });
}

$('#tree input[type="checkbox"]').change(function() {
    var isChecked = $(this).prop('checked');
    var siblings = $(this).parent().parent().children();

    siblings.each(function() {
        if ($(this).get(0) !== $(this).parent().get(0)) {
            $(this).find('input[type="checkbox"]').prop('checked', false);
        }
    });

    // Handle child checkboxes
    var childCheckboxes = $(this).parent().find('ul').find('input[type="checkbox"]');
    childCheckboxes.prop('checked', isChecked);
});
