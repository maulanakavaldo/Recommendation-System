# Recommendation-System
Designing and building a recommendation system to determine study programs from several universities using the analytical hierarchy process method. Variables used include accreditation, job prospects, number of applicants, capacity, and interest.

Demo: [Study Program Recommendation System](https://prodi-ahp.000webhostapp.com/)

<!-- ## Code
```python
import numpy as np
import pandas as pd
from sklearn.metrics.pairwise import cosine_similarity

# Load data: ratings, program features, AHP weights, and pairwise comparison matrix
ratings = pd.read_csv('ratings.csv')
program_features = pd.read_csv('program_features.csv')
ahp_weights = pd.read_csv('ahp_weights.csv')
pairwise_matrix = np.array([[1, 3, 5], [1/3, 1, 2], [1/5, 1/2, 1]])

# Collaborative Filtering (CF)
def collaborative_filtering(user_id, program_id):
    user_ratings = ratings[ratings['user_id'] == user_id]
    program_ratings = ratings[ratings['program_id'] == program_id]
    
    # Compute similarity scores using cosine similarity
    similarity_scores = cosine_similarity(
        user_ratings['rating'].values.reshape(1, -1),
        program_ratings['rating'].values.reshape(1, -1)
    )
    
    return similarity_scores[0][0]

# Content-Based Filtering (CBF)
def content_based_filtering(user_id, program_id):
    user_preferences = program_features[program_features['user_id'] == user_id].drop(['user_id'], axis=1)
    program_features = program_features[program_features['program_id'] == program_id].drop(['program_id'], axis=1)
    
    # Compute similarity scores using cosine similarity
    similarity_scores = cosine_similarity(user_preferences, program_features)
    
    return similarity_scores[0][0]

# Hybrid Methods
def hybrid_methods(user_id, program_id):
    cf_score = collaborative_filtering(user_id, program_id)
    cbf_score = content_based_filtering(user_id, program_id)
    
    # Combine CF and CBF scores using AHP weights
    hybrid_score = (cf_score * ahp_weights['CF_weight'][0]) + (cbf_score * ahp_weights['CBF_weight'][0])
    
    return hybrid_score

# Example usage
user_id = 1
program_id = 100
recommendations = []

# Calculate hybrid scores for all programs
for i in range(len(program_features)):
    program_id_i = program_features.iloc[i]['program_id']
    hybrid_score_i = hybrid_methods(user_id, program_id_i)
    recommendations.append((program_id_i, hybrid_score_i))

# Sort recommendations based on hybrid score
recommendations = sorted(recommendations, key=lambda x: x[1], reverse=True)

# Print top-k recommendations
top_k = 5
for i in range(top_k):
    print("Program ID:", recommendations[i][0], "Hybrid Score:", recommendations[i][1])


``` -->
