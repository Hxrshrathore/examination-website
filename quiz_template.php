<?php
include 'config.php';

if (!isset($_SESSION['form_id'])) {
    die("Invalid session data.");
}

$form_id = $_SESSION['form_id'];
$name = $_SESSION['name'];
$mobile_no = $_SESSION['mobile_no'];
$address = $_SESSION['address'];
$school_name = $_SESSION['school_name'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Quiz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/styles.css">
    <link rel="icon" href="assets/favicon.ico" type="image/x-icon">
    <script>
        function shuffleArray(array) {
            for (let i = array.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [array[i], array[j]] = [array[j], array[i]];
            }
        }

        function loadQuiz() {
            const formId = "<?php echo $form_id; ?>";
            document.getElementById('quiz-title').innerText = formId.charAt(0).toUpperCase() + formId.slice(1) + ' Quiz';

            // Load questions dynamically based on formId
            let questions = getQuestions(formId);
            shuffleArray(questions); // Shuffle the questions

            const quizForm = document.getElementById('quiz-form');
            questions.forEach((q, index) => {
                const questionDiv = document.createElement('div');
                questionDiv.classList.add('quiz-question');
                questionDiv.innerHTML = `<label>${index + 1}. ${q.question} <span>(1 mark)</span></label>
                    ${q.image ? `<div class="image-placeholder"><img src="${q.image}" alt="Question Image ${index + 1}" /></div>` : ''}
                    ${q.options.map((option, i) => `<div class="form-check">
                        <input class="form-check-input" type="radio" name="q${index}" value="${option.isCorrect ? 'correct' : 'incorrect'}" id="q${index}_${i}" required>
                        <label class="form-check-label" for="q${index}_${i}">${option.text}</label>
                    </div>`).join('')}`;
                quizForm.appendChild(questionDiv);
            });

            // Move the submit button to the end of the form
            const submitButton = document.createElement('div');
            submitButton.classList.add('submit-section');
            submitButton.innerHTML = '<button type="submit" class="btn btn-success">Submit Quiz</button>';
            quizForm.appendChild(submitButton);
        }

        function getQuestions(formId) {
            const questions = {
                class7: [
                    {
                        question: "Write 1001 in the binary system.",
                        options: [
                            { text: "11101001(2)", isCorrect: false },
                            { text: "1111101011(2)", isCorrect: false },
                            { text: "1110101001(2)", isCorrect: false },
                            { text: "1001101001(2)", isCorrect: true }
                        ]
                    },
                    {
                        question: "What is the capital of France?",
                        options: [
                            { text: "Berlin", isCorrect: false },
                            { text: "Madrid", isCorrect: false },
                            { text: "Paris", isCorrect: true },
                            { text: "Rome", isCorrect: false }
                        ]
                    },
                    {
                        question: "Solve: 10 + 15 - 5",
                        options: [
                            { text: "20", isCorrect: true },
                            { text: "25", isCorrect: false },
                            { text: "10", isCorrect: false },
                            { text: "15", isCorrect: false }
                        ]
                    },
                    {
                        question: "Identify the animal in the image below.",
                        image: "assets/image_placeholder.jpg",
                        options: [
                            { text: "Lion", isCorrect: false },
                            { text: "Tiger", isCorrect: true },
                            { text: "Elephant", isCorrect: false },
                            { text: "Giraffe", isCorrect: false }
                        ]
                    },
                    {
                        question: "Which of the following is a prime number?",
                        options: [
                            { text: "4", isCorrect: false },
                            { text: "6", isCorrect: false },
                            { text: "9", isCorrect: false },
                            { text: "7", isCorrect: true }
                        ]
                    },
                    {
                        question: "Identify the shape in the image below.",
                        image: "assets/image_placeholder2.jpg",
                        options: [
                            { text: "Circle", isCorrect: false },
                            { text: "Square", isCorrect: true },
                            { text: "Triangle", isCorrect: false },
                            { text: "Rectangle", isCorrect: false }
                        ]
                    },
                    {
                        question: "What is the boiling point of water?",
                        options: [
                            { text: "90°C", isCorrect: false },
                            { text: "100°C", isCorrect: true },
                            { text: "110°C", isCorrect: false },
                            { text: "120°C", isCorrect: false }
                        ]
                    },
                    {
                        question: "Identify the following object from the image.",
                        image: "assets/image_placeholder3.jpg",
                        options: [
                            { text: "Chair", isCorrect: false },
                            { text: "Table", isCorrect: true },
                            { text: "Lamp", isCorrect: false },
                            { text: "Sofa", isCorrect: false }
                        ]
                    },
                    {
                        question: "What is the chemical symbol for water?",
                        options: [
                            { text: "O2", isCorrect: false },
                            { text: "H2", isCorrect: false },
                            { text: "H2O", isCorrect: true },
                            { text: "CO2", isCorrect: false }
                        ]
                    },
                    {
                        question: "Which planet is known as the Red Planet?",
                        options: [
                            { text: "Earth", isCorrect: false },
                            { text: "Mars", isCorrect: true },
                            { text: "Jupiter", isCorrect: false },
                            { text: "Saturn", isCorrect: false }
                        ]
                    }
                ],
                class8: [
                    {
                        question: "What is 7 + 5?",
                        options: [
                            { text: "12", isCorrect: true },
                            { text: "13", isCorrect: false },
                            { text: "14", isCorrect: false },
                            { text: "15", isCorrect: false }
                        ]
                    },
                    {
                        question: "What is the chemical formula of carbon dioxide?",
                        options: [
                            { text: "CO", isCorrect: false },
                            { text: "CO2", isCorrect: true },
                            { text: "C2O", isCorrect: false },
                            { text: "C2O2", isCorrect: false }
                        ]
                    },
                    {
                        question: "Which is the largest ocean on Earth?",
                        options: [
                            { text: "Atlantic", isCorrect: false },
                            { text: "Pacific", isCorrect: true },
                            { text: "Indian", isCorrect: false },
                            { text: "Arctic", isCorrect: false }
                        ]
                    },
                    {
                        question: "Identify the building in the image below.",
                        image: "assets/image_placeholder4.jpg",
                        options: [
                            { text: "Eiffel Tower", isCorrect: false },
                            { text: "Empire State Building", isCorrect: true },
                            { text: "Burj Khalifa", isCorrect: false },
                            { text: "Big Ben", isCorrect: false }
                        ]
                    },
                    {
                        question: "What is the largest planet in our solar system?",
                        options: [
                            { text: "Earth", isCorrect: false },
                            { text: "Jupiter", isCorrect: true },
                            { text: "Saturn", isCorrect: false },
                            { text: "Neptune", isCorrect: false }
                        ]
                    },
                    {
                        question: "What is the freezing point of water?",
                        options: [
                            { text: "0°C", isCorrect: true },
                            { text: "10°C", isCorrect: false },
                            { text: "100°C", isCorrect: false },
                            { text: "50°C", isCorrect: false }
                        ]
                    },
                    {
                        question: "What is the capital city of Japan?",
                        options: [
                            { text: "Kyoto", isCorrect: false },
                            { text: "Tokyo", isCorrect: true },
                            { text: "Osaka", isCorrect: false },
                            { text: "Nagoya", isCorrect: false }
                        ]
                    },
                    {
                        question: "Identify the country shown in the image.",
                        image: "assets/image_placeholder5.jpg",
                        options: [
                            { text: "India", isCorrect: true },
                            { text: "China", isCorrect: false },
                            { text: "Brazil", isCorrect: false },
                            { text: "Australia", isCorrect: false }
                        ]
                    },
                    {
                        question: "What is the smallest prime number?",
                        options: [
                            { text: "1", isCorrect: false },
                            { text: "2", isCorrect: true },
                            { text: "3", isCorrect: false },
                            { text: "5", isCorrect: false }
                        ]
                    },
                    {
                        question: "What is the capital of Italy?",
                        options: [
                            { text: "Venice", isCorrect: false },
                            { text: "Milan", isCorrect: false },
                            { text: "Rome", isCorrect: true },
                            { text: "Florence", isCorrect: false }
                        ]
                    }
                ],
                class9: [
                    {
                        question: "What is the square root of 81?",
                        options: [
                            { text: "8", isCorrect: false },
                            { text: "9", isCorrect: true },
                            { text: "10", isCorrect: false },
                            { text: "11", isCorrect: false }
                        ]
                    },
                    {
                        question: "What is the formula for calculating the area of a circle?",
                        options: [
                            { text: "πr", isCorrect: false },
                            { text: "πr^2", isCorrect: true },
                            { text: "2πr", isCorrect: false },
                            { text: "r^2", isCorrect: false }
                        ]
                    },
                    {
                        question: "What is the powerhouse of the cell?",
                        options: [
                            { text: "Nucleus", isCorrect: false },
                            { text: "Mitochondria", isCorrect: true },
                            { text: "Ribosome", isCorrect: false },
                            { text: "Chloroplast", isCorrect: false }
                        ]
                    },
                    {
                        question: "Identify the molecule in the image below.",
                        image: "assets/image_placeholder6.jpg",
                        options: [
                            { text: "Water", isCorrect: false },
                            { text: "Glucose", isCorrect: true },
                            { text: "Ethanol", isCorrect: false },
                            { text: "Acetic acid", isCorrect: false }
                        ]
                    },
                    {
                        question: "What is the atomic number of hydrogen?",
                        options: [
                            { text: "0", isCorrect: false },
                            { text: "1", isCorrect: true },
                            { text: "2", isCorrect: false },
                            { text: "3", isCorrect: false }
                        ]
                    },
                    {
                        question: "What is the largest bone in the human body?",
                        options: [
                            { text: "Femur", isCorrect: true },
                            { text: "Tibia", isCorrect: false },
                            { text: "Humerus", isCorrect: false },
                            { text: "Radius", isCorrect: false }
                        ]
                    },
                    {
                        question: "What is the first element on the periodic table?",
                        options: [
                            { text: "Helium", isCorrect: false },
                            { text: "Hydrogen", isCorrect: true },
                            { text: "Oxygen", isCorrect: false },
                            { text: "Carbon", isCorrect: false }
                        ]
                    },
                    {
                        question: "Identify the plant cell in the image.",
                        image: "assets/image_placeholder7.jpg",
                        options: [
                            { text: "Animal cell", isCorrect: false },
                            { text: "Plant cell", isCorrect: true },
                            { text: "Bacterial cell", isCorrect: false },
                            { text: "Fungal cell", isCorrect: false }
                        ]
                    },
                    {
                        question: "What is the chemical symbol for gold?",
                        options: [
                            { text: "Au", isCorrect: true },
                            { text: "Ag", isCorrect: false },
                            { text: "Pb", isCorrect: false },
                            { text: "Pt", isCorrect: false }
                        ]
                    },
                    {
                        question: "What is the value of π (pi) approximately?",
                        options: [
                            { text: "2.14", isCorrect: false },
                            { text: "3.14", isCorrect: true },
                            { text: "4.14", isCorrect: false },
                            { text: "5.14", isCorrect: false }
                        ]
                    }
                ],
                class10: [
                    {
                        question: "What is the capital of Germany?",
                        options: [
                            { text: "Munich", isCorrect: false },
                            { text: "Berlin", isCorrect: true },
                            { text: "Frankfurt", isCorrect: false },
                            { text: "Hamburg", isCorrect: false }
                        ]
                    },
                    {
                        question: "Who discovered gravity?",
                        options: [
                            { text: "Albert Einstein", isCorrect: false },
                            { text: "Isaac Newton", isCorrect: true },
                            { text: "Galileo Galilei", isCorrect: false },
                            { text: "Nikola Tesla", isCorrect: false }
                        ]
                    },
                    {
                        question: "What is the formula for speed?",
                        options: [
                            { text: "Speed = Distance × Time", isCorrect: false },
                            { text: "Speed = Distance ÷ Time", isCorrect: true },
                            { text: "Speed = Time ÷ Distance", isCorrect: false },
                            { text: "Speed = Distance + Time", isCorrect: false }
                        ]
                    },
                    {
                        question: "Identify the famous landmark in the image.",
                        image: "assets/image_placeholder8.jpg",
                        options: [
                            { text: "Statue of Liberty", isCorrect: false },
                            { text: "Colosseum", isCorrect: true },
                            { text: "Big Ben", isCorrect: false },
                            { text: "Taj Mahal", isCorrect: false }
                        ]
                    },
                    {
                        question: "What is the value of acceleration due to gravity on Earth?",
                        options: [
                            { text: "9.8 m/s²", isCorrect: true },
                            { text: "10 m/s²", isCorrect: false },
                            { text: "9 m/s²", isCorrect: false },
                            { text: "8 m/s²", isCorrect: false }
                        ]
                    },
                    {
                        question: "What is the boiling point of water in Fahrenheit?",
                        options: [
                            { text: "100°F", isCorrect: false },
                            { text: "212°F", isCorrect: true },
                            { text: "300°F", isCorrect: false },
                            { text: "400°F", isCorrect: false }
                        ]
                    },
                    {
                        question: "What is the chemical symbol for sodium?",
                        options: [
                            { text: "Na", isCorrect: true },
                            { text: "S", isCorrect: false },
                            { text: "Sn", isCorrect: false },
                            { text: "Si", isCorrect: false }
                        ]
                    },
                    {
                        question: "Identify the country in the image.",
                        image: "assets/image_placeholder9.jpg",
                        options: [
                            { text: "France", isCorrect: true },
                            { text: "Spain", isCorrect: false },
                            { text: "Portugal", isCorrect: false },
                            { text: "Italy", isCorrect: false }
                        ]
                    },
                    {
                        question: "What is the largest mammal on Earth?",
                        options: [
                            { text: "Elephant", isCorrect: false },
                            { text: "Blue whale", isCorrect: true },
                            { text: "Giraffe", isCorrect: false },
                            { text: "Hippopotamus", isCorrect: false }
                        ]
                    },
                    {
                        question: "Who wrote 'Hamlet'?",
                        options: [
                            { text: "Charles Dickens", isCorrect: false },
                            { text: "William Shakespeare", isCorrect: true },
                            { text: "Jane Austen", isCorrect: false },
                            { text: "Mark Twain", isCorrect: false }
                        ]
                    }
                ],
                neet: [
                    {
                        question: "What is the unit of electric current?",
                        options: [
                            { text: "Volt", isCorrect: false },
                            { text: "Ampere", isCorrect: true },
                            { text: "Ohm", isCorrect: false },
                            { text: "Watt", isCorrect: false }
                        ]
                    },
                    {
                        question: "What is the chemical formula of glucose?",
                        options: [
                            { text: "C6H12O6", isCorrect: true },
                            { text: "C12H22O11", isCorrect: false },
                            { text: "C2H5OH", isCorrect: false },
                            { text: "CH4", isCorrect: false }
                        ]
                    },
                    {
                        question: "Which organ is responsible for pumping blood?",
                        options: [
                            { text: "Liver", isCorrect: false },
                            { text: "Heart", isCorrect: true },
                            { text: "Lung", isCorrect: false },
                            { text: "Kidney", isCorrect: false }
                        ]
                    },
                    {
                        question: "Identify the organ in the image.",
                        image: "assets/image_placeholder10.jpg",
                        options: [
                            { text: "Heart", isCorrect: true },
                            { text: "Lung", isCorrect: false },
                            { text: "Liver", isCorrect: false },
                            { text: "Kidney", isCorrect: false }
                        ]
                    },
                    {
                        question: "What is the powerhouse of the cell?",
                        options: [
                            { text: "Nucleus", isCorrect: false },
                            { text: "Mitochondria", isCorrect: true },
                            { text: "Ribosome", isCorrect: false },
                            { text: "Chloroplast", isCorrect: false }
                        ]
                    },
                    {
                        question: "What is the SI unit of force?",
                        options: [
                            { text: "Newton", isCorrect: true },
                            { text: "Joule", isCorrect: false },
                            { text: "Watt", isCorrect: false },
                            { text: "Pascal", isCorrect: false }
                        ]
                    },
                    {
                        question: "Which part of the plant is responsible for photosynthesis?",
                        options: [
                            { text: "Root", isCorrect: false },
                            { text: "Leaf", isCorrect: true },
                            { text: "Stem", isCorrect: false },
                            { text: "Flower", isCorrect: false }
                        ]
                    },
                    {
                        question: "What is the chemical symbol for potassium?",
                        options: [
                            { text: "K", isCorrect: true },
                            { text: "P", isCorrect: false },
                            { text: "Pt", isCorrect: false },
                            { text: "Pb", isCorrect: false }
                        ]
                    },
                    {
                        question: "What is the process of cell division called?",
                        options: [
                            { text: "Mitosis", isCorrect: true },
                            { text: "Meiosis", isCorrect: false },
                            { text: "Metamorphosis", isCorrect: false },
                            { text: "Morphogenesis", isCorrect: false }
                        ]
                    },
                    {
                        question: "What is the pH level of pure water?",
                        options: [
                            { text: "7", isCorrect: true },
                            { text: "0", isCorrect: false },
                            { text: "14", isCorrect: false },
                            { text: "1", isCorrect: false }
                        ]
                    }
                ],
                jee: [
                    {
                        question: "What is the acceleration due to gravity on Earth?",
                        options: [
                            { text: "9.8 m/s²", isCorrect: true },
                            { text: "10 m/s²", isCorrect: false },
                            { text: "9 m/s", isCorrect: false },
                            { text: "8 m/s²", isCorrect: false }
                        ]
                    },
                    {
                        question: "What is the chemical symbol for iron?",
                        options: [
                            { text: "Fe", isCorrect: true },
                            { text: "Ir", isCorrect: false },
                            { text: "In", isCorrect: false },
                            { text: "I", isCorrect: false }
                        ]
                    },
                    {
                        question: "What is the value of π (pi) approximately?",
                        options: [
                            { text: "3.14", isCorrect: true },
                            { text: "2.14", isCorrect: false },
                            { text: "4.14", isCorrect: false },
                            { text: "5.14", isCorrect: false }
                        ]
                    },
                    {
                        question: "Identify the molecule in the image.",
                        image: "assets/image_placeholder11.jpg",
                        options: [
                            { text: "Glucose", isCorrect: true },
                            { text: "Water", isCorrect: false },
                            { text: "Ethanol", isCorrect: false },
                            { text: "Acetic acid", isCorrect: false }
                        ]
                    },
                    {
                        question: "What is the atomic number of carbon?",
                        options: [
                            { text: "6", isCorrect: true },
                            { text: "12", isCorrect: false },
                            { text: "14", isCorrect: false },
                            { text: "16", isCorrect: false }
                        ]
                    },
                    {
                        question: "What is the boiling point of water in Celsius?",
                        options: [
                            { text: "100°C", isCorrect: true },
                            { text: "0°C", isCorrect: false },
                            { text: "50°C", isCorrect: false },
                            { text: "75°C", isCorrect: false }
                        ]
                    },
                    {
                        question: "Which element is represented by the symbol 'O'?",
                        options: [
                            { text: "Oxygen", isCorrect: true },
                            { text: "Osmium", isCorrect: false },
                            { text: "Oxide", isCorrect: false },
                            { text: "Ozone", isCorrect: false }
                        ]
                    },
                    {
                        question: "What is the chemical formula for sodium chloride?",
                        options: [
                            { text: "NaCl", isCorrect: true },
                            { text: "KCl", isCorrect: false },
                            { text: "NaCO3", isCorrect: false },
                            { text: "HCl", isCorrect: false }
                        ]
                    },
                    {
                        question: "Identify the planet in the image.",
                        image: "assets/image_placeholder12.jpg",
                        options: [
                            { text: "Mars", isCorrect: true },
                            { text: "Earth", isCorrect: false },
                            { text: "Jupiter", isCorrect: false },
                            { text: "Saturn", isCorrect: false }
                        ]
                    },
                    {
                        question: "What is the chemical symbol for calcium?",
                        options: [
                            { text: "Ca", isCorrect: true },
                            { text: "C", isCorrect: false },
                            { text: "Cu", isCorrect: false },
                            { text: "Cl", isCorrect: false }
                        ]
                    }
                ]
            };
            return questions[formId] || [];
        }

        let timer = 30 * 60;
        setInterval(() => {
            if (timer <= 0) {
                document.getElementById('quiz-form').submit();
            }
            const minutes = Math.floor(timer / 60);
            const seconds = timer % 60;
            document.getElementById('quiz-timer').innerText = `Time left: ${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
            timer--;
        }, 1000);

        window.onload = loadQuiz;
    </script>
</head>
<body>
    <div class="container">
        <header>
            <img src="assets/image.png" alt="Ved Academy Header">
        </header>
        <h2 id="quiz-title"></h2>
        <div id="quiz-timer">Time left: 30:00</div>
        <form id="quiz-form" method="POST" action="submit_quiz.php">
            <input type="hidden" name="form_id" value="<?php echo $form_id; ?>">
            <!-- Questions will be inserted here by JavaScript -->
        </form>
    </div>
    <footer>
        <p>&copy; 2024 Examination Website. All rights reserved.</p>
    </footer>
</body>
</html>
