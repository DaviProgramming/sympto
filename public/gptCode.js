const openAiKey = "sk-proj-LQIQQC4UF6DNV4RLAUDwT3BlbkFJksBk532IvZS39PBkN6G6";

async function fetchWithRetry(url, options, retries = 5, delay = 5000) {
    for (let i = 0; i < retries; i++) {
        const response = await fetch(url, options);
        if (response.ok) {
            return response.json();
        } else if (response.status === 429) {
            console.log(`Tentativa ${i + 1} falhou. Aguardando ${delay}ms antes de tentar novamente...`);
            await new Promise(resolve => setTimeout(resolve, delay));
        } else {
            throw new Error(`Erro na resposta da API: ${response.statusText}`);
        }
    }
    throw new Error('Limite de tentativas excedido');
}

const requestOptions = {
    method: "POST",
    headers: {
        "Content-Type": "application/json",
        "Authorization": "Bearer " + openAiKey
    },
    body: JSON.stringify({
        model: "gpt-3.5-turbo",
        messages: [
            {
                role: "system",
                content: "You are a poetic assistant, skilled in explaining complex programming concepts with creative flair."
            },
            {
                role: "user",
                content: "Compose a poem that explains the concept of recursion in programming."
            }
        ]
    })
};

fetchWithRetry("https://api.openai.com/v1/chat/completions", requestOptions)
    .then(data => {
        console.log(data);
    })
    .catch(error => {
        console.error('Erro:', error);
    });
