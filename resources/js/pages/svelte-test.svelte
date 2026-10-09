<script lang="ts">
    let count : number = $state(0);
</script>

<svelte:head>
    <title>Integration Test</title>
</svelte:head>

<div class="min-h-screen bg-gray-100 p-8 text-gray-900">
    <div class="mx-auto max-w-xl rounded-xl bg-white p-8 shadow">
        <p class="text-sm font-medium text-green-700">
            Laravel 13 + Inertia 3 + Svelte 5
        </p>
        <h1 class="mt-3 text-2xl font-bold">Svelte integration works.</h1>
        <p class="mt-3 text-gray-600">
            This component is rendered through an Inertia page, not a Blade
            view.
        </p>
        <div class="mt-6 rounded-lg border p-4">
            <p>Counter: <strong>{count}</strong></p>
            <button
                type="button"
                onclick={() => count++}
                class="mt-3 rounded-md bg-blue-600 px-4 py-2 text-white hover:bg-blue-700"
            >
                Increment counter
            </button>
        </div>
        <p class="mt-4 text-sm text-gray-500">
            Expected result: clicking the button increments the counter without
            reloading the page.
        </p>
    </div>
</div>
