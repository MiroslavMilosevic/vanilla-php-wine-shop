console.log('blaaaaaaaaaa12312');
let addFieldsCounter = 4;

let addFieldBtn = document.getElementById('add-field');

addFieldBtn.addEventListener('click', function(e){

    e.preventDefault();

    let wrapperDiv = document.getElementById('additional-fields-wrapper');

    console.log(wrapperDiv);

    addFieldsCounter++;

    let fieldParagraph = document.createElement('p');
    fieldParagraph.id = `p${addFieldsCounter}`;

    let inputFieldName = document.createElement('input');
    inputFieldName.type = 'text';
    inputFieldName.name = `fieldname-${addFieldsCounter}`;

    let addFieldSpan = document.createElement('span');
    addFieldSpan.innerText = ' : ';

    let inputFieldValue = document.createElement('input');
    inputFieldValue.type = 'text';
    inputFieldValue.name = `value-${addFieldsCounter}`;

    fieldParagraph.append(inputFieldName, addFieldSpan, inputFieldValue);

    wrapperDiv.appendChild(fieldParagraph);
    
});