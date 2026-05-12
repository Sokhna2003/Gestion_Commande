
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
      @theme {
        --color-clifford: #da373d;
      }
    </style>
    <title>Gestion Group Commandes</title>
</head>
<body class="bg-gray-100 font-sans">
<div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md mt-10">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-2">Ajouter un nouveau client</h2>
    
    <form method="POST" class="grid grid-cols-2 gap-4">
        <!-- Prénom -->
        <div class="col-span-1">
            <label class="block text-sm font-medium text-gray-700">Prénom</label>
            <input type="text" name="prenom" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <!-- Nom -->
        <div class="col-span-1">
            <label class="block text-sm font-medium text-gray-700">Nom</label>
            <input type="text" name="nom" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <!-- Email -->
        <div class="col-span-2">
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <!-- Téléphone -->
        <div class="col-span-1">
            <label class="block text-sm font-medium text-gray-700">Téléphone</label>
            <input type="text" name="telephone" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <!-- Adresse -->
        <div class="col-span-1">
            <label class="block text-sm font-medium text-gray-700">Adresse</label>
            <input type="text" name="adresse" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div class="col-span-2 mt-4">
            <button name = "add-client" type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 transition font-semibold">
                Enregistrer le client
            </button>
        </div>
    </form>
</div>