import UIKit from 'uikit';
import Icons from 'uikit/dist/js/uikit-icons';

window.UIKit = UIKit;
window.Icons = Icons;
UIKit.use(Icons);

import scrollIntoView from 'scroll-into-view';
let event = new Event("my_event");
document.addEventListener('itemshow', (e) => {
    
    let res = document.querySelector('.uk-lightbox-toolbar.uk-lightbox-caption.uk-position-bottom.uk-text-center.uk-transition-slide-bottom.uk-transition-opaque');
    let data_caption = res.innerHTML;
    data_caption = data_caption.split('/');
    
    if ((Number(data_caption[0]) + 2) === Number(data_caption[1])) {
        document.dispatchEvent(event);
    }

    let timeout = setTimeout( () => {
        let img = e.path[0].children[0];
        scrollIntoView(img, {
           time: 500,
            align: {
                top: 0
            }
        });
        img.setAttribute('tabindex', 1);
        img.focus();
        clearTimeout(timeout);
    }, 200)
});

document.addEventListener('hidden', () => {
  document.body.style = '';
  document.querySelector('html').classList.remove("uk-lightbox-page");
})
