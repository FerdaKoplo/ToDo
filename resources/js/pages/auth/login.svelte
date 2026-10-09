<script>
  import { useForm } from '@inertiajs/svelte';

  const form = useForm({
    email : '',
    otp : ''
  })

  let step = $state('request')

  const handleRequest = () => {
    form.post('/otp/request', {
        preserveScroll : true,
        onSuccess : () => {
             step = 'verify'; 
        }
    })
  }

  const handleVerify = () => {
    form.post('/otp/verify', {
            preserveScroll: true,
    });
  }


</script>

<div class="max-w-md mx-auto mt-10 p-6 bg-white rounded shadow">
    {#if step === 'request'}
        <h2 class="text-xl font-bold mb-4">Request OTP</h2>
        <form onsubmit={(e) => { e.preventDefault(); handleRequest(); }}>
            <input 
                type="email" 
                bind:value={form.email} 
                placeholder="Enter email"
                class="border p-2 w-full mb-2"
            />
            {#if form.errors.email}
                <p class="text-red-500 text-sm mb-2">{form.errors.email}</p>
            {/if}

            <button 
                type="submit" 
                disabled={form.processing}
                class="bg-blue-500 text-white p-2 rounded disabled:opacity-50"
            >
                {form.processing ? 'Sending...' : 'Send OTP'}
            </button>
        </form>
    {:else}
        <h2 class="text-xl font-bold mb-4">Verify OTP</h2>
        <form onsubmit={(e) => { e.preventDefault(); handleVerify(); }}>
            <input 
                type="text" 
                bind:value={form.otp} 
                placeholder="Enter OTP"
                class="border p-2 w-full mb-2"
            />
            {#if form.errors.otp}
                <p class="text-red-500 text-sm mb-2">{form.errors.otp}</p>
            {/if}

            <button 
                type="submit" 
                disabled={form.processing}
                class="bg-green-500 text-white p-2 rounded disabled:opacity-50"
            >
                {form.processing ? 'Verifying...' : 'Verify'}
            </button>
        </form>
        
        <button onclick={() => step = 'request'} class="mt-4 text-sm text-blue-500 underline">
            Back to email
        </button>
    {/if}
</div>