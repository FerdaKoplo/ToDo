<script>
    import { useForm } from "@inertiajs/svelte";
    import { Button } from "@/components/ui/button";
    import Input from "@/components/ui/input/input.svelte";
    import { Label } from "@/components/ui/label/index.js";
    import * as InputOTP from "@/components/ui/input-otp/index.js";
    import { onMount } from "svelte";

    import { fly } from "svelte/transition";
    import { backOut } from "svelte/easing";

    const colors = [
        "bg-blue-400",
        "bg-mist-400",
        "bg-mist-700",
        "bg-mauve-400",
        "bg-red-400",
        "bg-pink-300",
    ];

    const shuffledColors = [...colors].sort(() => 0.5 - Math.random());

    const random = (min, max) =>
        Math.floor(Math.random() * (max - min + 1)) + min;

    const backgroundShapes = Array.from({ length: 6 }).map((_, i) => {
        const verticalAnchor = Math.random() > 0.5 ? "top" : "bottom";
        const horizontalAnchor = Math.random() > 0.5 ? "left" : "right";

        return {
            color: shuffledColors[i],
            size: random(80, 120),
            yOffset: random(-80, 10),
            xOffset: random(-160, 20),
            rotation: random(-45, 45),
            anchorY: verticalAnchor,
            anchorX: horizontalAnchor,

            delay: random(100, 500),
            duration: random(500, 1200),
            flyY: random(-220, 150),
            flyX: random(-150, 150),
        };
    });

    const form = useForm({
        email: "",
        otp: "",
    });

    let step = $state("request");
    let mounted = $state(false);

    onMount(() => {
        setTimeout(() => {
            mounted = true;
        }, 10);
    });

    const handleRequest = () => {
        form.post("/otp/request", {
            preserveScroll: true,
            onSuccess: () => {
                step = "verify";
            },
        });
    };

    const handleResend = () => {
        form.post("/otp/resend", {
            preserveScroll: true,
            onSuccess: () => {
                step = "verify";
            },
        });
    };

    const handleVerify = () => {
        form.post("/otp/verify", {
            preserveScroll: true,
        });
    };
</script>

<div
    class="min-h-screen flex flex-col items-center justify-center p-4 bg-mist-50"
>
    <div class="flex flex-col gap-5 items-center font-mono mb-24 relative z-20">
        <h2 class="text-xl">Welcome Aboard at</h2>
        <h2 class="font-bold text-4xl">
            <span class="text-indigo-600">To</span>
            <span class="text-red-600 text-7xl">DO</span>
        </h2>
    </div>

    <div class="relative w-full max-w-md">
        <div class="w-full flex flex-col gap-10 relative z-10">
            {#if step === "request"}
                <div
                    class="rounded-xl flex w-full flex-col gap-6 p-6 bg-slate-50 shadow-[5px_5px_0_rgba(0,0,0,0.25)] text-center"
                >
                    <form
                        onsubmit={(e) => {
                            e.preventDefault();
                            handleRequest();
                        }}
                        class="w-full"
                    >
                        <div class="flex items-start flex-col gap-5">
                            <div class="flex flex-col items-start gap-3 w-full">
                                <Label for="email">Email</Label>
                                <Input
                                    id="email"
                                    type="email"
                                    value={form.email}
                                    oninput={(e) =>
                                        (form.email = e.currentTarget.value)}
                                    placeholder="Enter Your Email"
                                    class="mb-2"
                                />
                            </div>
                            {#if form.errors.email}
                                <p class="text-red-400 text-sm mb-2">
                                    {form.errors.email}
                                </p>
                            {/if}

                            <Button
                                type="submit"
                                disabled={form.processing}
                                class="w-full bg-mist-800 text-white font-mono"
                            >
                                {form.processing ? "Sending..." : "Send OTP"}
                            </Button>
                        </div>
                    </form>
                </div>

                <div
                    class="flex flex-col gap-6 p-6 bg-amber-50 shadow-[5px_5px_0_rgba(0,0,0,0.25)] items-center rounded"
                >
                    <div class="flex justify-between w-full items-center gap-3">
                        <div
                            class="rotate-180 w-5 h-0.5 border-2 border-gray-800"
                        ></div>
                        <div class="font-bold">
                            <h1>Or</h1>
                        </div>
                        <div
                            class="rotate-180 w-5 h-0.5 border-2 border-gray-800"
                        ></div>
                    </div>
                    <Button
                        class="w-full px-7 py-4 flex gap-3 bg-cyan-800 hover:bg-cyan-950 font-semibold"
                    >
                        <svg
                            width="80"
                            height="80"
                            viewBox="0 0 24 24"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M21.5939 11.0792H12.3209V13.8256H18.9768C18.6214 17.6382 15.5196 19.286 12.5148 19.286C8.70223 19.286 5.30969 16.3135 5.30969 12.0162C5.30969 7.88057 8.54068 4.74651 12.5148 4.74651C15.5519 4.74651 17.3936 6.71741 17.3936 6.71741L19.2676 4.74651C19.2676 4.74651 16.7474 2.00016 12.3856 2.00016C6.6344 1.96785 2.24023 6.78203 2.24023 11.9839C2.24023 17.0243 6.37592 22 12.4825 22C17.8783 22 21.7554 18.349 21.7554 12.8886C21.7877 11.7578 21.5939 11.0792 21.5939 11.0792Z"
                                fill="#ffffff"
                            />
                        </svg>
                        Login with Google
                    </Button>
                </div>
            {:else}
                <div class="flex flex-col gap-6 items-start w-full">
                    <Button
                        type="button"
                        variant="outline"
                        size="xs"
                        disabled={form.processing}
                        onclick={handleResend}
                        class="mt-4 text-sm text-gray-800"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="lucide lucide-rotate-ccw preview-icon"
                        >
                            <path
                                d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"
                            />
                            <path d="M3 3v5h5" />
                        </svg>
                        {form.processing ? "Resending OTP..." : "Resend OTP"}
                    </Button>
                    <form
                        onsubmit={(e) => {
                            e.preventDefault();
                            handleVerify();
                        }}
                        class="w-full"
                    >
                        <div
                            class="rounded-xl p-6 bg-slate-50 shadow-[5px_5px_0_rgba(0,0,0,0.25)] text-center flex flex-col gap-5 items-start"
                        >
                            <div
                                class="flex items-center flex-col gap-5 w-full"
                            >
                                <InputOTP.Root
                                    maxlength={6}
                                    id="otp-verification"
                                    required
                                    bind:value={form.otp}
                                >
                                    {#snippet children({ cells })}
                                        <InputOTP.Group
                                            class="*:data-[slot=input-otp-slot]:h-12 *:data-[slot=input-otp-slot]:w-11 *:data-[slot=input-otp-slot]:text-xl"
                                        >
                                            {#each cells.slice(0, 3) as cell (cell)}
                                                <InputOTP.Slot {cell} />
                                            {/each}
                                        </InputOTP.Group>
                                        <InputOTP.Separator class="mx-2" />
                                        <InputOTP.Group
                                            class="*:data-[slot=input-otp-slot]:h-12 *:data-[slot=input-otp-slot]:w-11 *:data-[slot=input-otp-slot]:text-xl"
                                        >
                                            {#each cells.slice(3, 6) as cell (cell)}
                                                <InputOTP.Slot {cell} />
                                            {/each}
                                        </InputOTP.Group>
                                    {/snippet}
                                </InputOTP.Root>
                            </div>

                            {#if form.errors.email}
                                <p class="text-red-400 text-sm mb-2">
                                    {form.errors.email}
                                </p>
                            {/if}

                            {#if form.errors.otp}
                                <p class="text-red-400 text-sm mb-2">
                                    {form.errors.otp}
                                </p>
                            {/if}

                            <Button
                                type="submit"
                                disabled={form.processing}
                                class="w-full"
                            >
                                {form.processing ? "Verifying..." : "Verify"}
                            </Button>
                        </div>
                    </form>
                </div>
            {/if}
        </div>

        {#if mounted}
            {#each backgroundShapes as shape}
                <div
                    in:fly|global={{
                        y: shape.flyY,
                        x: shape.flyX,
                        duration: shape.duration,
                        delay: shape.delay,
                        easing: backOut,
                    }}
                    class="absolute z-0"
                    style="
                        {shape.anchorY}: {shape.yOffset}px;
                        {shape.anchorX}: {shape.xOffset}px;
                    "
                >
                    <div
                        class="rounded shadow-sm {shape.color}"
                        style="
                            width: {shape.size}px;
                            height: {shape.size}px;
                            transform: rotate({shape.rotation}deg);
                        "
                    ></div>
                </div>
            {/each}
        {/if}
    </div>
</div>
