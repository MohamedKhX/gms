import preset from '../../../../vendor/filament/filament/tailwind.config.preset'

export default {
    presets: [preset],
    content: [
        './app/Filament/Trainee/**/*.php',
        './resources/views/filament/trainee/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
}
