window.UIKit = require('uikit');
window.Icons = require('uikit/dist/js/uikit-icons');
UIKit.use(Icons);

import scrollIntoView from 'scroll-into-view';

document.addEventListener('itemshow', (e) => {
    let timeout = setTimeout( () => {
        let img = e.path[0].children[0];
        scrollIntoView(img, {
            align: {
                top: 0
            }
        });
        img.setAttribute('tabindex',1);
        img.focus();
        clearTimeout(timeout);
    },100)
});