//

import { createInertiaApp } from '@inertiajs/svelte';
import { mount } from 'svelte';

await createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob('./pages/**/*.svelte', {
            eager: true,
        });

        const page = pages[`./pages/${name}.svelte`];

        if (!page) {
            throw new Error(`Inertia page not found: ${name}`);
        }

        console.log('Page module found:', page);
        console.log('Returning default export:', page.default);
        return page
    },

    setup({ el, App, props }) {
        console.log('Setup function called');
        console.log('Target Element (el):', el);
        console.log('App Component:', App);
        console.log('Props:', props);

        if (!el) {
            console.error('Target element is null! Check your app.blade.php for @inertia directive.');
            return;
        }

        try {
            const app = mount(App, { target: el, props });
            console.log('Mount successful!', app);
        } catch (error) {
            console.error('Mount failed with error:', error);
        }
    },
});