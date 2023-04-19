SELECT users.username, COUNT(test_completion.completion_id) AS completion_count, test_completion.percentage as procenta
FROM users
JOIN test_histories ON users.user_id = test_histories.user_id
JOIN test_completion ON test_completion.history_id = test_histories.history_id
GROUP BY users.username
HAVING procenta > 80;
