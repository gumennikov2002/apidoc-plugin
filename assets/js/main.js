drawJson();

function drawJson() {
    const elements = document.querySelectorAll('.draw-json');

    elements.forEach(e => {
        const code = e.getAttribute('data-code');
        const data = JSON.parse(code);

        e.innerHTML = syntaxHighlight(JSON.stringify(data, undefined, 4));
    })
}

function syntaxHighlight(json) {
    json = json.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
    return json.replace(
        /("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\b\d+(?:\.\d+)?(?:[eE][+-]?\d+)?\b)/g,
        function (match) {
            let cls = 'number';
            if (/^"/.test(match)) {
                if (/:$/.test(match)) {
                    cls = 'key';
                } else {
                    cls = 'string';
                }
            } else if (/true|false/.test(match)) {
                cls = 'boolean';
            } else if (/null/.test(match)) {
                cls = 'null';
            }
            return '<span class="' + cls + '">' + match + '</span>';
        }
    );
}

function showCardBody(cardId, show = true) {
    const card = document.querySelector(`[data-card-id="${cardId}"]`);
    const cardBody = card.querySelector('.body');

    cardBody.style.display = show ? 'block' : 'none';
    card.querySelector('.manage-show').style.display = show ? 'none' : 'block';
    card.querySelector('.manage-hide').style.display = show ? 'block' : 'none';
}
